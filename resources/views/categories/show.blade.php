@extends('layouts.app')
@section('content')

    <div class="col-sm-12 col-md-2 col-lg-2 px-md-0">
        <h3>Categories</h3>
        <ul class="list-unstyled">
        @foreach($categories as $category)
            <li>
                <span class="badge badge-pill badge-dark pull-right">{{ $category->articles->count() }}</span>
                <a class="text-dark" href="{{ url('categories', $category->id) }}">
                    @if(url()->current() == url('categories', $category->id))
                        <strong>{{ $category->title }}</strong>
                    @else
                        {{ $category->title }}
                    @endif
                </a>
            </li>
        @endforeach
        </ul>
    </div>

    <div class="col-sm-12 col-md-6 col-lg-6 offset-md-1">
        <h2>Articles in this category</h2><hr>
        @foreach ($articles as $article)
            <h2><a class="text-dark" href="/articles/{{ $article->id }}">{{ $article->title }}</a></h2>
            <p class="my-0">by <a class="lead text-dark" href="#">{{ $article->user->name }}</a></p>
            <p>{{ $article->created_at->format('F j, Y') }} at {{ $article->created_at->format('H:i A') }}</p>
            <p class="lead">
                {{ str_limit(strip_tags($article->body), 200) }}
                @if(strlen(strip_tags($article->body)) > 200)
                    <br><a href="/articles/{{ $article->id }}" class="text-danger">Read more >></a>
                @endif
            </p><hr>
        @endforeach
        {{ $articles->links() }}
    </div>

    <div class="col-sm-12 col-md-2 col-lg-2 px-3 offset-md-1">
        <h3>Blog Tools</h3>
        <p><a href="/articles/create" class="btn text-success bg-dark">Create article</a></p>
        <p><a href="/categories" class="btn btn-sm text-primary bg-dark"><i class="fas fa-edit"></i> Manage categories</a></p>
    </div>
@endsection
