@extends('layouts.app')
@section('content')

    <div class="col-md-7 col-lg-7">

        @include('partials._flash')

        @foreach ($categories as $category)
            <h5 class="text-dark">{{ $category->title }}</h5>
            <span class="my-0">by {{ $category->user->name }}</span>
            <p>{{ $category->created_at->format('F j, Y') }} at {{ $category->created_at->format('H:i A') }}
                <span class="float-right">
                    <a href="/categories/{{$category->id}}/edit" class="btn btn-sm text-primary bg-dark mr-3">Edit Category</a>
                    <a onclick="
                        var result = confirm('Delete this category?');
                        if(result) {
                        event.preventDefault();
                        document.getElementById('delete-category').submit();
                    }" class="btn btn-sm text-danger bg-dark"
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
        <p><a href="/categories/create" class="btn text-success bg-dark">New Category</a></p>
        <p><a href="/articles/" class="btn btn-sm text-warning bg-dark"><< To Articles</a></p>
    </div>

@endsection
