@extends('layouts.app')
@section('content')

    <div class="col-md-7 col-lg-7" style="height: 100vh;">

        @include('partials._flash')

        <form action="{{ route('articles.update', [$article->id]) }}" method="post">
            {{ csrf_field() }}

            <input type="hidden" name="_method" value="put">

            <div class="form-group">
              <label for="article-title">Title:</label>
              <input type="text" class="form-control" name="title" id="article-title" placeholder="Enter title.." value="{{ $article->title }}">
            </div>

            <div class="form-group">
              <label for="article-body">Description:</label>
              <textarea rows="5" class="form-control" name="body" id="article-body" placeholder="Enter description..">{{ $article->body }}</textarea>
            </div>

            <div class="form-group">
                <select class="form-control" id="article-category" name="category_id">
                    <option value="" selected>Choose category:</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->title }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
              <input type="submit" value="Update Article" class="btn btn-dark text-primary btn-block">
            </div>
        </form>
    </div>
    <div class="col-md offset-md-3">
        <h3>Links</h3>
        <p><a href="/articles/{{ $article->id }}" class="btn btn-sm text-warning bg-dark"><i class="fas fa-hand-point-left"></i> To Article</a></p>
    </div>

@endsection
