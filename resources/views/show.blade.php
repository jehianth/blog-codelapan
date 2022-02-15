<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Primary Meta Tags -->
        <title>{{ $post->title }}</title>
        <meta name="title" content="{{ $post->title }}">
        <meta name="description" content="{{ $post->meta_desc }}">
        <meta name="keywords" content="{{ $post->keywords }}">
        <!-- Open Graph / Facebook -->
        <meta property="og:type" content="article">
        <meta property="og:url" content="{{ URL::current() }}">
        <meta property="og:title" content="{{ $post->title }}">
        <meta property="og:description" content="{{ $post->meta_desc }}">
        <meta property="og:image" content="{{ asset('storage/'.$post->cover) }}">
        <!-- Twitter -->
        <meta property="twitter:card" content="summary_large_image">
        <meta property="twitter:url" content="{{ URL::current() }}">
        <meta property="twitter:title" content="{{ $post->title }}">
        <meta property="twitter:description" content="{{ $post->meta_desc }}">
        <meta property="twitter:image" content="{{ asset('storage/'.$post->cover) }}">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    </head>
    <body>
        <div class="container my-5">
            <div class="row">
                <div class="card">
                    <img src="{{ asset('storage/'.$post->cover) }}" alt="" class="img-fluid">
                    <div class="card-body">
                        <h1 class="card-title">{{ $post->title }}</h1>
                        <div class="d-flex my-2">
                            <small class="text-muted">by {{ $post->user->name }} ・ {{ Carbon\Carbon::parse($post->created_at)->isoFormat('D MMMM Y'); }}</small>
                        </div>
                        <p>{{ $post->desc }}</p>
                        <div class="card-footer bg-transparent d-flex mx-auto">
                            <a href="{{ route('category',$post->category->slug) }}" class="text-dark">{{ $post->category->name }}</a>
                            <div class="d-flex ml-auto">
                                @foreach ($post->tags as $item)
                                <a href="{{ route('tag', $item->slug) }}" class="badge badge-secondary mr-1">{{ $item->name }}</a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    </body>
</html>
