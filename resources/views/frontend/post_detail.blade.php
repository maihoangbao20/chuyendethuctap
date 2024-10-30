@extends('layouts.site')

@section('title', $post->title)

@section('content')
    <link rel="stylesheet" href="{{ asset('css/post_detail.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    @include('frontend.header')

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <div class="post-gallery">
                    <img src="{{ asset('images/posts/' . $post->image) }}" class="img-fluid main-image" alt="{{ $post->title }}">
                    <!-- You can add more images or thumbnails here if available -->
                </div>
            </div>
            <div class="col-md-6">
                <h1 class="post-title">{{ $post->title }}</h1>
                <div class="post-description mt-4">
                    <h4>Mô tả bài viết:</h4>
                    <p>{{ $post->description }}</p>
                </div>
                <div class="post-content mt-4">
                    <p>{{ $post->detail }}</p>
                </div>
            </div>
        </div>

            <div class="row mt-5">
                <div class="col-md-12">
                    <h1 class="home-title-2">Bài Viết Liên Quan</h1>
                    <div class="row">
                        @foreach($relatedPosts->chunk(4) as $chunk)
                            @foreach($chunk as $relatedPost)
                                <div class="col-lg-3 col-md-6 mb-4">
                                    <a href="{{ route('post_detail', ['id' => $relatedPost->id]) }}" class="card-link">
                                        <div class="card h-100">
                                            <img class="card-img-top" src="{{ asset('images/posts/' . $relatedPost->image) }}" alt="{{ $relatedPost->title }}">
                                            <div class="card-body">
                                                <h4 class="card-title">{{ $relatedPost->title }}</h4>
                                                <p class="card-text">{{ $relatedPost->description }}</p>
                                            </div>
                                            <div class="card-footer">
                                                <a href="{{ route('post_detail', ['id' => $relatedPost->id]) }}" class="btn btn-primary">Xem Chi Tiết</a>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('frontend.footer')
@endsection
<style>
    body {
        padding-top: 20px;
        padding-bottom: 20px;
    }

    .container {
        padding-left: 15px;
        padding-right: 15px;
    }

    .post-gallery {
        text-align: center;
        margin-bottom: 20px;
    }

    .main-image {
        max-width: 100%;
        height: auto; 
        border: 1px solid #ccc;
        padding: 10px;
        margin-bottom: 20px;
    }

    .post-title {
        font-size: 2rem;
        font-weight: bold;
        margin-top: 10px;
    }

    .post-description {
        font-size: 1rem;
        line-height: 1.5;
        margin-top: 20px;
        margin-bottom: 20px;
    }

    .post-content {
        margin-top: 20px;
        margin-bottom: 20px;
    }

    .home-title-2 {
        text-align: center;
        margin-bottom: 2rem;
    }

    .card-link {
        color: inherit;
        text-decoration: none;
    }

    .card {
        height: 100%;
        border: 1px solid #ddd;
        border-radius: 8px;
        overflow: hidden;
    }

    .card-body {
        padding: 15px;
    }

    .card-img-top {
        margin: 0 auto;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .card-title {
        font-size: 1.2rem;
        font-weight: bold;
        margin-top: 10px;
    }

    .card-text {
        margin-top: 10px;
        margin-bottom: 10px;
        color: #555;
    }

    .card-footer {
        padding: 10px;
        background-color: #f8f9fa;
    }

    .card-footer .btn {
        width: 100%;
        font-weight: bold;
        border-radius: 25px;
        padding: 8px 5px;
        transition: all 0.3s ease;
        display: block;
        text-decoration: none;
        font-size: 14px;
    }

    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
        color: #fff;
    }

    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #0056b3;
        color: #fff;
    }
</style>