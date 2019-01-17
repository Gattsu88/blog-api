@extends('layouts.app')
@section('content')

    <div class="col-md-5 col-lg-5" style="height: 80vh;">

        @include('partials._flash')

        <form action="{{ route('categories.store') }}" method="post">
            {{ csrf_field() }}

            <div class="form-group">
              <label for="category-title">Category:</label>
              <input type="text" class="form-control" name="title" id="category-title" placeholder="Enter category.." required>
            </div>

            <div class="form-group">
              <input type="submit" value="Create Category" class="btn btn-dark text-success btn-block">
            </div>
        </form>
    </div>
    <div class="col-md-3 col-lg-3 offset-md-4">
       <h3>Links</h3>
        <p><a href="/categories" class="btn btn-sm text-warning bg-dark"><i class="fas fa-hand-point-left"></i> To Categories</a></p>
    </div>

@endsection
