@extends('layouts.app')
@section('content')

    <div class="col-md-2">
        <h3>Categories</h3>
        @foreach($categories as $category)
            <a href="#">{{ $category->title }}</a><br>
        @endforeach
    </div>

    <div class="col-md-6 offset-md-1">
        <h1>Articles</h1><hr>
        @foreach ($articles as $article)
            <h2><a class="text-primary" href="/articles/{{ $article->id }}">{{ $article->title }}</a></h2>
            <p class="my-0">by {{ $article->user->name }}</p>
            <p>{{ $article->created_at->format('F j, Y') }} at {{ $article->created_at->format('H:i A') }}</p>
            <p class="lead">
                {{ str_limit(strip_tags($article->body), 200) }}
                @if(strlen(strip_tags($article->body)) > 200)
                    <br><a href="/articles/{{ $article->id }}" class="text-info">Read more >></a>
                @endif
            </p><hr>
        @endforeach
        {!! $articles->links() !!}
    </div>

    <div class="col-md-2 offset-md-1">
        <h3>Blog Tools</h3>
        <p><a href="/articles/create" class="btn btn-success btn-block text-light">Create article</a></p>
        <p>Manage categories</p>
    </div>
@endsection
