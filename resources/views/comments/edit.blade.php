@extends('layouts.app')
@section('content')

    <div class="col-md-7 col-lg-7">

        @include('partials._flash')

        <form action="{{ route('comments.update', [$comment->id]) }}" method="post">
            {{ csrf_field() }}

            <input type="hidden" name="_method" value="put">

            <div class="form-group">
              <label for="comment-title">Title:</label>
              <input type="text" class="form-control" name="title" id="comment-title" placeholder="Enter title.." value="{{ $comment->title }}">
            </div>

            <div class="form-group">
              <label for="comment-body">Description:</label>
              <textarea rows="5" class="form-control" name="body" id="comment-body" placeholder="Enter description..">{{ $comment->body }}</textarea>
            </div>

            <div class="form-group">
              <input type="submit" value="Update Comment" class="btn btn-dark text-primary btn-block">
            </div>
        </form>
    </div>
    <div class="col-md offset-md-3">
        <h3>Links</h3>
        <p><a href="/articles" class="btn text-warning btn-sm bg-dark"><i class="fas fa-hand-point-left"></i> To Article</a></p>
    </div>

@endsection
