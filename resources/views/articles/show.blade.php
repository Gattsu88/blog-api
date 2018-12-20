@extends('layouts.app')
@section('content')

    <div class="col-md-7" style="min-height: 300px;">
        <h2>{{ $article->title }}</h2>
        <p class="my-0">by {{ $article->user->name }}</p>
        <p>{{ $article->created_at->format('M j, Y') }} at {{ $article->created_at->format('H:i') }}</p>
        <p class="lead">{{ $article->body }}</p><hr>

        <a href="/articles/{{$article->id}}/edit" class="btn btn-primary">Edit Article</a>
        <a onclick="
            var result = confirm('Delete this article?');
            if(result) {
                event.preventDefault();
                document.getElementById('delete-article').submit();
            }" class="btn btn-danger btn-sm float-right"
        >Delete Article</a>
        <form action="{{ route('articles.destroy', [$article->id]) }}" id="delete-article" method="post" style="display: none;">
            <input type="hidden" name="_method" value="Delete">
            {{ csrf_field() }}
        </form>
    </div>

@endsection
