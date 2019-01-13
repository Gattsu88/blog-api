@extends('layouts.app')
@section('content')

    <div class="col-md-4 col-lg-4">

        @include('partials._flash')

        <form action="{{ route('categories.update', [$category->id]) }}" method="post">
            {{ csrf_field() }}

            <input type="hidden" name="_method" value="put">

            <div class="form-group">
              <label for="category-title">Title:</label>
              <input type="text" class="form-control" name="title" id="category-title" placeholder="Enter title.." value="{{ $category->title }}">
            </div>

            <div class="form-group">
              <input type="submit" value="Update Category" class="btn btn-dark text-primary btn-block">
            </div>
        </form>
    </div>
    <div class="col-md-2 col-lg-2 offset-md-5">
        <h3>Links</h3>
        <p><a href="/categories" class="btn btn-outline-warning btn-sm bg-dark"><i class="fas fa-hand-point-left"></i> To Categories</a></p>
    </div>

@endsection
