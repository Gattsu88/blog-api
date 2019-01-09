@extends('layouts.app')
@section('content')

    <div class="col-md-7 col-lg-7" style="min-height: 300px;">

        @include('partials._flash')

        <h2>{{ $article->title }}</h2>
        <p class="my-0">by <a class="text-dark lead" href="#">{{ $article->user->name }}</a></p>
        <p>{{ $article->created_at->format('M j, Y') }} at {{ $article->created_at->format('H:i') }}</p>
        <p class="lead">{{ $article->body }}</p>

        @if(Auth::user() && Auth::id() == $article->user->id)

            <a href="/articles/{{$article->id}}/edit" class="btn btn-sm text-primary bg-dark">Edit Article</a>
            <a onclick="
                var result = confirm('Delete this article?');
                if(result) {
                    event.preventDefault();
                    document.getElementById('delete-article').submit();
                }" class="btn btn-sm text-danger bg-dark float-right"
            >Delete Article</a>
            <form action="{{ route('articles.destroy', [$article->id]) }}" id="delete-article" method="post" style="display: none;">
                <input type="hidden" name="_method" value="Delete">
                {{ csrf_field() }}
            </form>
        @endif
        <hr>

        <div class="row">
            <div class="col-md-10 col-lg-10 offset-md-2">

                @if(Auth::user())
                    <h4>Leave your comment..</h4><hr>
                    <form action="{{ route('comments.store') }}" method="post">
                        {{ csrf_field() }}

                        <div class="form-group">
                          <label for="comment-title">Title:</label>
                          <input type="text" class="form-control" name="title" id="comment-title" placeholder="Enter title.." required>
                        </div>
                        <div class="form-group">
                          <label for="comment-body">Description:</label>
                          <textarea rows="5" class="form-control" name="body" id="comment-body" placeholder="Enter description.." required></textarea>
                        </div>
                        <div class="form-group">
                          <input type="submit" value="Create Comment" class="btn btn-success btn-block">
                        </div>
                    </form><hr>
                @else
                    <p class="lead text-danger">You must be logged in to enter your comment..</p>
                @endif

                    <h3>All Comments</h3><br>
                    @if($article->comments->count() > 0)
                        @foreach($article->comments as $comment)
                           <section class="comments">
                               <article class="comment">
                           		<a class="comment-img" href="#non">
                           		<img src="http://lorempixum.com/50/50/people/7" alt="" width="50" height="50">
                           		</a>

                           		<div class="comment-body">
                           			<div class="text">
                           			  <p class="lead"><a href="comments/{{ $comment->id }}">{{ $comment->title }}</a></p>
                           			  <p>{{ $comment->body }}</p>
                           			</div>
                           		<p class="attribution">by <a class="text-dark" href="#">{{ $comment->user->name }}</a> {{ $comment->created_at }}</p>
                           		</div>
                           	</article>
                           </section>​
                        @endforeach
                    @else
                        <h4>No comments for this article.</h4>
                    @endif
            </div>
        </div><hr>
    </div>
    <div class="col-md offset-md-2">
        <h3>Links</h3>
        <p><a href="/articles" class="btn btn-sm text-warning bg-dark"><< To Articles</a></p>
    </div>

@endsection
