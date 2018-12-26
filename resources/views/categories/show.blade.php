@extends('layouts.app')
@section('content')

    <div class="col-sm-12 col-md-2 col-lg-2 px-md-0">
        <h3>Categories</h3>
        <ul class="list-unstyled">
        @foreach($categories as $category)
            <li>
                <i class="fas fa-caret-right"></i>
                <a href="{{ url('categories', $category->id) }}">
                    @if(url()->current() == url('categories', $category->id))
                        <b>{{ $category->title }}
                        <span class="badge pull-right">({{ $category->articles->count() }})</span></b>
                    @else
                        {{ $category->title }}
                        <span class="badge pull-right">({{ $category->articles->count() }})</span>
                    @endif
                </a>
            </li>
        @endforeach
        </ul>
    </div>

    <div class="col-sm-12 col-md-6 col-lg-6 offset-md-1">
        <h1>{{ $category->title }}</h1><hr>
        @foreach ($articles as $article)
            <h3><a class="text-primary" href="/articles/{{ $article->id }}">{{ $article->title }}</a></h3>
            <p class="my-0">by {{ $article->user->name }}</p>
            <p>{{ $article->created_at->format('F j, Y') }} at {{ $article->created_at->format('H:i A') }}</p>
            <p class="lead">
                {{ str_limit(strip_tags($article->body), 200) }}
                @if(strlen(strip_tags($article->body)) > 200)
                    <br><a href="/articles/{{ $article->id }}" class="text-info">Read more >></a>
                @endif
            </p><hr>
        @endforeach
        {{ $articles->links() }}
    </div>

    <div class="col-sm-12 col-md-2 col-lg-2 px-0 offset-md-1">
        <h3>Blog Tools</h3>
        <p><a href="/articles/create" class="btn btn-success btn-block text-light">Create article</a></p>
        <p><a href="/categories" class="btn btn-primary btn-block btn-sm text-light">Manage categories</a></p>
    </div>
@endsection
