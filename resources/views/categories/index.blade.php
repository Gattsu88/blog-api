@extends('layouts.app')
@section('content')

    <div class="col-md-7">
        @include('partials._flash')
        <a href="/articles/create" class="btn btn-success btn-block text-light">New Article</a><hr>
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

@endsection
