@extends('layouts.app')
@section('content')

    <div class="col-md-7 col-lg-7" style="height: 90vh;">

        @include('partials._flash')

        <form action="{{ route('articles.store') }}" method="post" id="article-create">
            {{ csrf_field() }}

            <h3 class="text-white">Create article</h3>

            <div class="form-group">
              <label for="article-title">Title:</label>
              <input type="text" class="form-control" name="title" id="article-title" placeholder="Enter title..">
            </div>

            <div class="form-group">
              <label for="article-body">Description:</label>
              <textarea rows="5" class="form-control" name="body" id="article-body" placeholder="Enter description.."></textarea>
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
              <input type="submit" value="Create Article" class="btn btn-dark text-success btn-block">
            </div>
        </form>
    </div>
    <div class="col-md-2 col-lg-2 offset-md-3">
       <h3>Links</h3>
        <p><a href="/articles" class="btn btn-sm text-warning bg-dark"><i class="fas fa-hand-point-left"></i> To Articles</a></p>
    </div>

@endsection
