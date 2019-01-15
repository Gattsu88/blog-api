@extends('layouts.app')

@section('title', '| Articles')

@section('content')

    <div class="col-sm-12 col-md-2 col-lg-2 px-md-0">
        <h3>Categories</h3>
        <ul class="list-unstyled">
        @foreach($categories as $category)
            <li>
                <span class="badge badge-pill badge-dark pull-right"> {{ $category->articles->count() }}</span>
                <a class="text-dark" href="/categories/{{ $category->id }}">
                    {{ $category->title }}
                </a>
            </li>
        @endforeach
        </ul>
    </div>

    <div class="col-sm-12 col-md-6 col-lg-6 offset-md-1">

        @include('partials._flash')

        <h2>All Articles</h2><hr>
        @foreach ($articles as $article)
            <h2><a class="text-dark" href="/articles/{{ $article->id }}">{{ $article->title }}</a></h2>
            <p class="my-0">by <a class="lead text-dark" href="#">{{ $article->user['name'] }}</a></p>
            <p>{{ $article->created_at->format('F j, Y') }} at {{ $article->created_at->format('H:i') }}</p>
            <p class="lead">
                {{ str_limit(strip_tags($article->body), 200) }}
                @if(strlen(strip_tags($article->body)) > 200)
                    <br><a href="/articles/{{ $article->id }}" class="text-danger">Read more >></a>
                @endif
            </p><hr>
        @endforeach
        {{ $articles->links() }}
    </div>

    <div class="col-sm-4 col-md-2 col-lg-2 px-3 offset-md-1">
        <h3>Blog Tools</h3>
        @if(Auth::check())
            <p><a href="/articles/create" class="btn text-success bg-dark">Create article</a></p>
            <p><a href="/categories" class="btn btn-sm text-primary bg-dark">Manage categories</a></p>
        @else
            <p class="text-danger">Login to create new article</p>
        @endif
    </div>
@endsection
