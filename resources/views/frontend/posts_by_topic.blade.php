@extends('layouts.site')

@section('title', $topic->name)
<link rel="stylesheet" href="{{ asset('css/home.css') }}">

@section('content')
@include('frontend.header')

<div class="container">
    <h2 class="my-4">Bài Viết Thuộc: {{ $topic->name }}</h2>
    
    @if($posts->isEmpty())
        <p>Không có bài viết nào có sẵn trong chủ đề này.</p>
    @else
        <div class="row d-flex flex-wrap">
            @foreach ($posts as $post)
                <div class="col-lg-3 col-md-4 col-sm-6 mb-4 d-flex align-items-stretch">
                    <a href="{{ route('post_detail', ['id' => $post->id]) }}" class="card-link">
                        <div class="card h-100">
                            <img class="card-img-top" src="{{ asset('images/posts/' . $post->image) }}" alt="{{ $post->title }}">
                            <div class="card-body">
                                <h4 class="card-title">
                                    <a href="{{ route('post_detail', ['id' => $post->id]) }}">{{ $post->title }}</a>
                                </h4>
                                {{-- <h5 class="card-detail">{{ $post->detail }}</h5> --}}
                                <p class="card-description">{{ Str::limit($post->description, 100) }}</p>
                            </div>
                            <div class="card-footer text-center">
                                <div class="row">
                                    <div class="col-12">
                                        <a href="{{ route('post_detail', ['id' => $post->id]) }}" class="btn btn-primary">Xem Chi Tiết</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    @endif
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
    .card {
        height: 100%;
        border: 1px solid #ddd;
        border-radius: 8px;
        overflow: hidden;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        transition: transform 0.2s;
    }

    .card-link {
        text-decoration: none;
        color: inherit;
    }

    .card-link:hover .card {
        transform: scale(1.02);
    }

    .card-body {
        padding: 15px;
        flex: 1;
    }

    .card-img-top {
        margin: 0 auto;
        display: flex;
        justify-content: center;
        align-items: center;
        max-height: 150px;
        object-fit: cover;
    }

    .card-title {
        margin-bottom: 10px;
    }

    .card-detail {
        font-size: 1.1em;
        color: #555;
        margin-bottom: 10px;
    }

    .card-description {
        margin-bottom: 15px;
    }

    .card-footer {
        padding: 10px;
        background-color: #f8f9fa;
    }

    .card-footer .row {
        justify-content: center;
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
        color: #fff;
        border: 1px solid #007bff;
    }

    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #0056b3;
        color: #fff;
    }
</style>
