<!-- resources/views/search_results.blade.php -->
@extends('layouts.site')

@section('content')
    <h1>Kết quả tìm kiếm cho: "{{ $query }}"</h1>
    
    @if($products->isEmpty())
        <p>Không tìm thấy sản phẩm nào.</p>
    @else
        <div class="product-list">
            @foreach($products as $product)
                <div class="product-item">
                    <a href="{{ url('product/' . $product->id) }}">
                        <img src="{{ asset('img/products/' . $product->image) }}" alt="{{ $product->name }}">
                        <h2>{{ $product->name }}</h2>
                        <p>{{ number_format($product->price) }} VNĐ</p>
                    </a>
                </div>
            @endforeach
        </div>
    @endif
@endsection
