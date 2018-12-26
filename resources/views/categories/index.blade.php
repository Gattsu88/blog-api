@extends('layouts.app')
@section('content')

    <div class="col-md-7 col-lg-7">
        @include('partials._flash')
        <a href="/categories/create" class="btn btn-success btn-block text-light">New Category</a><hr>
        @foreach ($categories as $category)
            <h5><a class="text-primary" href="/category/{{ $category->id }}">{{ $category->title }}</a></h5>
            <span class="my-0">by {{ $category->user->name }}</span>
            <p>{{ $category->created_at->format('F j, Y') }} at {{ $category->created_at->format('H:i A') }}
                <span class="float-right">
                    <a href="/categories/{{$category->id}}/edit" class="btn btn-primary btn-sm mr-3">Edit Category</a>
                    <a onclick="
                        var result = confirm('Delete this category?');
                        if(result) {
                        event.preventDefault();
                        document.getElementById('delete-category').submit();
                        }" class="btn btn-danger btn-sm text-white"
                        >Delete Category
                    </a>
                    <form action="{{ route('categories.destroy', [$category->id]) }}" id="delete-category" method="post" style="display: none;">
                        <input type="hidden" name="_method" value="Delete">
                        {{ csrf_field() }}
                    </form>
                </span>
            </p>
            <hr>
        @endforeach
    </div>
    <div class="col-md offset-md-2">
       <h3>Links</h3>
        <p><a href="/articles">To Articles</a></p>
    </div>

@endsection
