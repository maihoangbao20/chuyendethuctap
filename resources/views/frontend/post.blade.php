@extends('layouts.site')

@section('title', 'Tất cả bài viết')

@section('content')
<link rel="stylesheet" href="{{ asset('css/home.css') }}">
<link rel="stylesheet" href="{{ asset('css/header.css') }}">

@include('frontend.header')

<div class="container">
    <h1 class="home-title-2" id="cap">Tất Cả Bài Viết</h1>
    <div class="row d-flex flex-wrap">
        @foreach($posts as $post)
            <div class="col-lg-3 col-md-4 col-sm-6 mb-4 d-flex align-items-stretch">
                <a href="{{ route('post_detail', ['id' => $post->id]) }}" class="card-link">
                    <div class="card h-100">
                        <img class="card-img-top" src="{{ asset('images/posts/' . $post->image) }}" alt="{{ $post->title }}">
                        <div class="card-body">
                            <h4 class="card-title">{{ $post->title }}</h4>
                            <p class="card-text">{{ $post->description }}</p>
                        </div>
                        <div class="card-footer text-center">
                            <a href="{{ route('post_detail', ['id' => $post->id]) }}" class="btn btn-primary">Đọc thêm</a>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
    <div class="clearfix">
        <div class="float-left">
            <nav aria-label="Page navigation">
                <ul class="pagination">
                    @if ($posts->onFirstPage())
                        <li class="page-item disabled">
                            <span class="page-link" aria-label="Trang trước">
                                <span aria-hidden="true">&laquo; Trang trước</span>
                                <span class="sr-only">Trang trước</span>
                            </span>
                        </li>
                    @else
                        <li class="page-item">
                            <a class="page-link" href="{{ $posts->previousPageUrl() }}" aria-label="Trang trước">
                                <span aria-hidden="true">&laquo; Trang trước</span>
                                <span class="sr-only">Trang trước</span>
                            </a>
                        </li>
                    @endif
                    
                    @foreach (range(1, $posts->lastPage()) as $page)
                        <li class="page-item {{ $page == $posts->currentPage() ? 'active' : '' }}">
                            <a class="page-link" href="{{ $posts->url($page) }}">{{ $page }}</a>
                        </li>
                    @endforeach
                    
                    @if ($posts->hasMorePages())
                        <li class="page-item">
                            <a class="page-link" href="{{ $posts->nextPageUrl() }}" aria-label="Trang tiếp theo">
                                <span aria-hidden="true">Trang tiếp theo &raquo;</span>
                                <span class="sr-only">Trang tiếp theo</span>
                            </a>
                        </li>
                    @else
                        <li class="page-item disabled">
                            <span class="page-link" aria-label="Trang tiếp theo">
                                <span aria-hidden="true">Trang tiếp theo &raquo;</span>
                                <span class="sr-only">Trang tiếp theo</span>
                            </span>
                        </li>
                    @endif
                </ul>
            </nav>
        </div>
    </div>
</div>

@include('frontend.footer')
@endsection

<style>
    .home-title-2#cap {
        text-shadow: 0 4px 0 #f4f2f2, 0 7px 0 rgb(243, 100, 10);
        text-align: center;
        margin-bottom: 2rem;
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

    .card-footer {
        padding: 10px;
        background-color: #f8f9fa;
    }

    .card-footer .btn {
        width: 100%;
        font-weight: bold;
        border-radius: 25px;
        padding: 8px 20px;
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

    @media (max-width: 768px) {
        .home-title-2#cap {
            font-size: 24px;
        }
    }
</style>
