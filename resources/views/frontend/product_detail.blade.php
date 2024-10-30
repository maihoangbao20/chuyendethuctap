@extends('layouts.site')
@section('title','EStore - Chi tiết sản phẩm')
@section('content')
    <body>
<style>
    #wishlistModalTimer,
    #cartSuccessModalTimer {
        font-size: 1.2em;
        font-weight: bold;
        color: #f00; /* Màu sắc của thời gian đếm ngược */
    }
    .col-lg-3 {
        max-height:700px;
        
    }
    .product-detail-top {
        max-height : 800px;
    }
    .product-slider-single{
        max-height: 450px;
    }
    .price-original {
        text-decoration: line-through;
        color: #888;
        margin-right: 10px;
    }

    .price-sale {
        color: #d9534f;
    }
    .product-item {
        border: 1px solid #e1e1e1;
        /* padding: 20px; */
        /* margin-bottom: 30px; */
        background-color: #fff;
        position: relative;
        transition: all 0.3s ease-in-out;
        height: 100%;
        max-height:500px;
    }

    .product-title a {
        font-size: 18px; /* Set font size for product name */
        color: #333;
        text-decoration: none;
        display: block;
        max-height: 55px; /* Set max height for product name */
        overflow: hidden; /* Hide overflow if name is too long */
        text-overflow: ellipsis; /* Add ellipsis for overflow text */
    }

    .product-title .ratting {
        margin-top: 10px;
    }

    .product-title .ratting i {
        color: #f8ce0b;
    }

    .product-image {
        text-align: center;
        /* margin-top: 15px; */
        max-height:350px;
    }

    .product-image img {
        max-width: 100%;
        max-height: 100%; /* Ensure image fits within the specified height */
        object-fit: cover; /* Ensure image maintains aspect ratio and covers the area */
    }

    .product-action {
        position: absolute;
        top: 10px;
        right: 10px;
        display: flex;
        gap: 10px;
    }

    .product-action a {
        font-size: 18px;
        color: #333;
        text-decoration: none;
    }

    .product-price {
        text-align: center;
        /* margin-top: 20px; */
    }

    .product-price h3 {
        font-size: 24px; /* Set font size for product price */
        margin-bottom: 10px;
    }

    .product-price .btn {
        display: inline-block;
        background-color: #007bff;
        color: #fff;
        /* padding: 10px 20px; */
        text-decoration: none;
        border-radius: 5px;
        transition: background-color 0.3s ease-in-out;
    }

    .product-price .btn:hover {
        background-color: #0056b3;
    }
</style>
        @include('frontend.header')
            <!-- Breadcrumb Start -->
            <div class="breadcrumb-wrap">
                <div class="container-fluid">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('/')}}">Trang chủ</a></li>
                        <li class="breadcrumb-item"><a href="{{url('product')}}">Sản phẩm</a></li>
                        <li class="breadcrumb-item active">Chi tiết sản phẩm</li>
                    </ul>
                </div>
            </div>
            <!-- Breadcrumb End -->
            
            <!-- Product Detail Start -->
            <div class="product-detail">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="product-detail-top">
                                <div class="row align-items-center">
                                    <div class="col-md-5">
                                        <div class="product-slider-single normal-slider">
                                            @foreach ($product->images as $image)
                                                <img src="{{ asset('img/products/' . $image->filename) }}" alt="Product Image">
                                            @endforeach
                                        </div>
                                        <div class="product-slider-single-nav normal-slider">
                                            @foreach ($product->images as $image)
                                                <div class="slider-nav-img"><img src="{{ asset('img/products/' . $image->filename) }}" alt="Product Image"></div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="col-md-7">
                                        <div class="product-content">
                                        <div class="title">
                                                <h2>{{ $product->name }}</h2>
                                            </div>
                                            <div class="ratting">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                            <div class="price">
                                                <h4>Giá:</h4>
                                                @if($product->pricesale)
                                                    <p>{{ number_format($product->pricesale, 0, ',', '.') }} đ <span>{{ number_format($product->price, 0, ',', '.') }} đ</span></p>
                                                @else
                                                    <p>{{ number_format($product->price, 0, ',', '.') }} đ</p>
                                                @endif
                                            <div class="quantity">
                                                <h4>Số lượng:</h4>
                                                <div class="qty">
                                                    <button class="btn-minus"><i class="fa fa-minus"></i></button>
                                                    <input type="text" value="1">
                                                    <button class="btn-plus"><i class="fa fa-plus"></i></button>
                                                </div>
                                            </div>
                                            <div class="p-size">
                                                <h4>Size:</h4>
                                                <div class="btn-group btn-group-sm">
                                                    @foreach($product->sizes as $size)
                                                        <button type="button" class="btn" data-quantity="{{ $size->quantity }}">{{ $size->size }}</button>
                                                    @endforeach
                                                </div>
                                            </div>
                                            <div class="p-color">
                                                <h4>Color:</h4>
                                                <div class="btn-group btn-group-sm">
                                                    <button type="button" class="btn">White</button>
                                                    <button type="button" class="btn">Black</button>
                                                    <button type="button" class="btn">Blue</button>
                                                </div>
                                            </div>
                                            <div class="action">
                                                {{-- <a> --}}
                                                    <form action="{{ route('add.to.cart', ['product' => $product->id]) }}" method="POST" class="cart-form" data-product-id="{{ $product->id }}">
                                                        @csrf
                                                        <button class="btn" type="submit" class="btn btn-link p-0" style="display: inline;">
                                                            <i class="fa fa-cart-plus"></i>
                                                            Thêm vào giỏ hàng
                                                        </button>
                                                    </form>
                                                    <form action="{{ route('buy.now', ['product' => $product->id]) }}" method="POST" class="buy-now-form" style="display: inline;">
                                                        @csrf
                                                        <button class="btn" type="submit" class="btn btn-link p-0" style="display: inline;">
                                                            <i class="fa fa-shopping-bag"></i>
                                                            Mua ngay
                                                        </button>
                                                    </form>
                                                {{-- <a class="btn" href="#"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</a> --}}
                                                {{-- <a class="btn" href="{{ route('buy.now', ['product' => $product->id]) }}"><i class="fa fa-shopping-bag"></i>Mua ngay</a> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row product-detail-bottom">
                                <div class="col-lg-12">
                                    <ul class="nav nav-pills nav-justified">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-toggle="pill" href="#description">Mô tả</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="pill" href="#specification">Chi tiết</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="pill" href="#reviews">Đánh giá (1)</a>
                                        </li>
                                    </ul>

                                    <div class="tab-content">
                                        <div id="description" class="container tab-pane active">
                                            <h4>Mô tả sản phẩm</h4>
                                            <p>
                                                {{ $product->description }}
                                            </p>
                                        </div>
                                        <div id="specification" class="container tab-pane fade">
                                            <h4>Thông số kĩ thuật</h4>
                                            <div style="max-height: 400px; overflow-y: auto;">
                                                @foreach(explode("\n", $product->detail) as $detail)
                                                    <p>{{ $detail }}</p>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div id="reviews" class="container tab-pane fade">
                                            <div class="reviews-submitted">
                                                <div class="reviewer">Phasellus Gravida - <span>01 Jan 2020</span></div>
                                                <div class="ratting">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <p>
                                                    Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.
                                                </p>
                                            </div>
                                            <div class="reviews-submit">
                                                <h4>Give your Review:</h4>
                                                <div class="ratting">
                                                    <i class="far fa-star"></i>
                                                    <i class="far fa-star"></i>
                                                    <i class="far fa-star"></i>
                                                    <i class="far fa-star"></i>
                                                    <i class="far fa-star"></i>
                                                </div>
                                                <div class="row form">
                                                    <div class="col-sm-6">
                                                        <input type="text" placeholder="Name">
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <input type="email" placeholder="Email">
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <textarea placeholder="Review"></textarea>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <button>Submit</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="product">
                                <div class="section-header">
                                    <h1>Sản phẩm liên quan</h1>
                                </div>

                                <div class="row align-items-center product-slider product-slider-3">
                                    @foreach($productorder as $product)
                                    <div class="col-lg-3">
                                        <div class="product-item">
                                            <div class="product-title">
                                                <a href="{{ route('product_detail', ['id' => $product->id]) }}">{{ $product->name }}</a>
                                                <!-- Đánh giá sao của sản phẩm -->
                                                <!-- Bổ sung các icon sao tương ứng với đánh giá của sản phẩm -->
                                            </div>
                                            <div class="product-image">
                                                <a href="{{ route('product_detail', ['id' => $product->id]) }}">
                                                    @if($product->images->isNotEmpty())
                                                        <img src="{{ asset('img/products/' . $product->images->first()->filename) }}" alt="{{ $product->name }}">
                                                    @else
                                                        <img src="{{ asset('img/default-image.jpg') }}" alt="Default Image">
                                                    @endif
                                                </a>
                                                <div class="product-action">
                                                    <a>
                                                        <form action="{{ route('add.to.cart', ['product' => $product->id]) }}" method="POST" class="cart-form" data-product-id="{{ $product->id }}">
                                                            @csrf
                                                            <button type="submit" class="btn btn-link p-0" style="display: inline;">
                                                                <i class="fa fa-cart-plus"></i>
                                                            </button>
                                                        </form>
                                                    </a>
                                                    <a>
                                                        <form action="{{ route('wishlist.add', ['id' => $product->id]) }}" method="POST" class="wishlist-form" data-product-id="{{ $product->id }}">
                                                            @csrf
                                                            <button type="submit" class="btn btn-link p-0" style="display: inline;">
                                                                <i class="fa fa-heart"></i>
                                                            </button>
                                                        </form>
                                                    </a>
                                                    <a href="{{ route('product_detail', ['id' => $product->id]) }}"><i class="fa fa-search"></i></a>
                                                </div>
                                            </div>
                                            <div class="product-price">
                                                @if($product->pricesale)
                                                    <h3>
                                                        <span class="price-sale">{{ number_format($product->pricesale, 0, ',', '.') }} đ</span>
                                                        <span class="price-original">{{ number_format($product->price, 0, ',', '.') }} đ</span>
                                                    </h3>
                                                @else
                                                    <h3>{{ number_format($product->price, 0, ',', '.') }} đ</h3>
                                                @endif
                                                <a class="btn" href=""><i class="fa fa-shopping-cart"></i>Mua ngay</a>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        </div>
                        <!-- Side Bar Start -->
                        <div class="col-lg-4 sidebar">
                            <div class="sidebar-widget category">
                                <h2>Categories</h2>
                                <ul class="list-group">
                                    @foreach($categories as $category)
                                    <li class="list-group-item">
                                        <a href="{{ route('category.products', ['id' => $category->id]) }}">{{ $category->name }}</a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                            
                            <div class="sidebar-widget widget-slider">
                                <div class="sidebar-slider normal-slider">
                                    @foreach($productorder as $product)
                                    <div class="product-item sidebar-product-item">
                                        <div class="product-title">
                                            <a href="{{ route('product_detail', ['id' => $product->id]) }}">{{ $product->name }}</a>
                                        </div>
                                        <div class="product-image">
                                            <a href="{{ route('product_detail', ['id' => $product->id]) }}">
                                                @if($product->images->isNotEmpty())
                                                    <img src="{{ asset('img/products/' . $product->images->first()->filename) }}" alt="{{ $product->name }}">
                                                @else
                                                    <img src="{{ asset('img/default-image.jpg') }}" alt="Default Image">
                                                @endif
                                            </a>
                                            <div class="product-action">
                                                <a>
                                                    <form action="{{ route('add.to.cart', ['product' => $product->id]) }}" method="POST" class="cart-form" data-product-id="{{ $product->id }}">
                                                        @csrf
                                                        <button type="submit" class="btn btn-link p-0" style="display: inline;">
                                                            <i class="fa fa-cart-plus"></i>
                                                        </button>
                                                    </form>
                                                </a>
                                                <a>
                                                    <form action="{{ route('wishlist.add', ['id' => $product->id]) }}" method="POST" class="wishlist-form" data-product-id="{{ $product->id }}">
                                                        @csrf
                                                        <button type="submit" class="btn btn-link p-0" style="display: inline;">
                                                            <i class="fa fa-heart"></i>
                                                        </button>
                                                    </form>
                                                </a>
                                                <a href="{{ route('product_detail', ['id' => $product->id]) }}"><i class="fa fa-search"></i></a>
                                            </div>
                                        </div>
                                        <div class="product-price">
                                            @if($product->pricesale)
                                                <h3>
                                                    <span class="price-sale">{{ number_format($product->pricesale, 0, ',', '.') }} đ</span>
                                                    <span class="price-original">{{ number_format($product->price, 0, ',', '.') }} đ</span>
                                                </h3>
                                            @else
                                                <h3>{{ number_format($product->price, 0, ',', '.') }} đ</h3>
                                            @endif
                                            <a class="btn" href=""><i class="fa fa-shopping-cart"></i>Mua ngay</a>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            
                            <div class="sidebar-widget brands">
                                <h2>Brands</h2>
                                <ul class="list-group">
                                    @foreach($brands as $brand)
                                    <li class="list-group-item">
                                        <a href="{{ route('brand.products', ['id' => $brand->id]) }}">{{ $brand->name }}</a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                            
                            <div class="sidebar-widget tag">
                                <h2 class="title">Tags Cloud</h2>
                                <a href="#">Lorem ipsum</a>
                                <a href="#">Vivamus</a>
                                <a href="#">Phasellus</a>
                                <a href="#">pulvinar</a>
                                <a href="#">Curabitur</a>
                                <a href="#">Fusce</a>
                                <a href="#">Sem quis</a>
                                <a href="#">Mollis metus</a>
                                <a href="#">Sit amet</a>
                                <a href="#">Vel posuere</a>
                                <a href="#">orci luctus</a>
                                <a href="#">Nam lorem</a>
                            </div>
                        </div>
                        <!-- Side Bar End -->
                    </div>
                </div>
            </div>
            <!-- Product Detail End -->
            <!-- Brand Start -->
            {{-- <div class="brand">
                <div class="container-fluid">
                    <div class="brand-slider">
                        <div class="brand-item"><img src="img/brand-1.png" alt=""></div>
                        <div class="brand-item"><img src="img/brand-2.png" alt=""></div>
                        <div class="brand-item"><img src="img/brand-3.png" alt=""></div>
                        <div class="brand-item"><img src="img/brand-4.png" alt=""></div>
                        <div class="brand-item"><img src="img/brand-5.png" alt=""></div>
                        <div class="brand-item"><img src="img/brand-6.png" alt=""></div>
                    </div>
                </div>
            </div> --}}
            <!-- Brand End -->
        
        @include('frontend.footer')
        
        <!-- Back to Top -->
        <!-- Back to Top -->
        <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
        
        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
        <script src="{{ asset('lib/easing/easing.min.js') }}"></script>
        <script src="{{ asset('lib/slick/slick.min.js') }}"></script>
        <!-- Template Javascript -->
        <script src="{{asset('js/main.js')}}"></script>
    </body>
    {{-- Thông báo yêu thích --}}
<script>
    $(document).ready(function() {
        // Xử lý khi click vào form yêu thích
        $(document).on('submit', '.wishlist-form', function(e) {
            e.preventDefault();

            var form = $(this);
            var url = form.attr('action');

            $.ajax({
                url: url,
                type: 'POST',
                data: form.serialize(),
                success: function(response) {
                    $('#wishlistModalMessage').text(response.message);
                    $('#wishlistModalLink').attr('href', response.wishlist_url).text('Xem danh sách yêu thích');
                    $('#wishlistModal').modal('show');

                    // Tự động đóng modal sau 5 giây
                    setTimeout(function() {
                        $('#wishlistModal').modal('hide');
                    }, 5000);
                    // Hiển thị thời gian đếm ngược
                    var countDown = 5;
                    var timer = setInterval(function() {
                        countDown--;
                        $('#wishlistModalTimer').text(countDown);

                        if (countDown <= 0) {
                            clearInterval(timer);
                        }
                    }, 1000);
                },
                error: function(xhr) {
                    if (xhr.status === 401) {
                        $('#loginRequiredModalMessage').text('Bạn cần đăng nhập để thêm vào danh sách yêu thích.'); // Đảm bảo thông báo được cập nhật
                        $('#loginRequiredModalLink').attr('href', '{{ route('login') }}').text('Đăng nhập');
                        $('#loginRequiredModal').modal('show');

                        // Tự động đóng modal sau 5 giây
                        // setTimeout(function() {
                        //     $('#loginRequiredModal').modal('hide');
                        // }, 5000);
                        // Hiển thị thời gian đếm ngược
                        // var countDown = 5;
                        // var timer = setInterval(function() {
                        //     countDown--;
                        //     $('#loginRequiredModalTimer').text(countDown);

                        //     if (countDown <= 0) {
                        //         clearInterval(timer);
                        //     }
                        // }, 1000);
                    } else {
                        alert('Có lỗi xảy ra khi thêm sản phẩm vào danh sách yêu thích.');
                    }
                }
            });
        });
    });
</script>
    {{-- Thêm vào giỏ hàng --}}
<script>
    $(document).ready(function() {
        // Xử lý khi click vào form thêm vào giỏ hàng
        $(document).on('submit', '.cart-form', function(e) {
            e.preventDefault();

            var form = $(this);
            var url = form.attr('action');

            $.ajax({
                url: url,
                type: 'POST',
                data: form.serialize(),
                success: function(response) {
                    $('#cartSuccessModalMessage').text(response.message);
                    $('#cartSuccessModalLink').attr('href', response.cart_url).text('Xem giỏ hàng');
                    $('#cartSuccessModal').modal('show');

                    // Auto close modal after 5 seconds
                    setTimeout(function() {
                        $('#cartSuccessModal').modal('hide');
                    }, 5000);

                    // Countdown timer
                    var countDown = 5;
                    var timer = setInterval(function() {
                        countDown--;
                        $('#cartSuccessModalTimer').text(countDown);

                        if (countDown <= 0) {
                            clearInterval(timer);
                        }
                    }, 1000);
                },
                error: function(xhr) {
                    if (xhr.status === 401) {
                        $('#loginRequiredModalMessage').text('Bạn cần đăng nhập để thêm vào giỏ hàng.'); // Đảm bảo thông báo được cập nhật
                        $('#loginRequiredModalLink').attr('href', '{{ route('login') }}').text('Đăng nhập');
                        $('#loginRequiredModal').modal('show');

                        // Tự động đóng modal sau 5 giây
                        // setTimeout(function() {
                        //     $('#loginRequiredModal').modal('hide');
                        // }, 5000);
                        // Hiển thị thời gian đếm ngược
                        // var countDown = 5;
                        // var timer = setInterval(function() {
                        //     countDown--;
                        //     $('#loginRequiredModalTimer').text(countDown);

                        //     if (countDown <= 0) {
                        //         clearInterval(timer);
                        //     }
                        // }, 1000);
                    } else {
                        alert('Có lỗi xảy ra khi thêm sản phẩm vào danh sách yêu thích.');
                    }
                }
            });
        });
    });
</script>

        <!-- Modal -->
<!-- Modal Thông báo yêu cầu đăng nhập -->
<div class="modal fade" id="loginRequiredModal" tabindex="-1" role="dialog" aria-labelledby="loginRequiredModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <p id="loginRequiredModalMessage">Bạn cần đăng nhập để thêm vào danh sách yêu thích. (<span id="loginRequiredModalTimer">5</span> giây)</p>
            </div>
            <div class="modal-footer">
                <a id="loginRequiredModalLink" href="{{ route('login') }}" class="btn btn-primary">Đăng nhập</a>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Thông báo thêm vào danh sách yêu thích -->
<div class="modal fade" id="wishlistModal" tabindex="-1" role="dialog" aria-labelledby="wishlistModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <p id="wishlistModalMessage">Sản phẩm đã được thêm vào danh sách yêu thích. (<span id="wishlistModalTimer">5</span> giây)</p>
            </div>
            <div class="modal-footer">
                <a id="wishlistModalLink" href="{{ route('wishlist') }}" class="btn btn-primary">Xem danh sách yêu thích</a>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Yêu cầu đăng nhập -->
<div class="modal fade" id="loginRequiredModal" tabindex="-1" role="dialog" aria-labelledby="loginRequiredModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <p id="loginRequiredModalMessage">Bạn cần đăng nhập để thêm sản phẩm vào giỏ hàng. (<span id="loginRequiredModalTimer">5</span> giây)</p>
            </div>
            <div class="modal-footer">
                <a id="loginRequiredModalLink" href="{{ route('login') }}" class="btn btn-primary">Đăng nhập</a>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Thông báo thêm vào giỏ hàng thành công -->
<div class="modal fade" id="cartSuccessModal" tabindex="-1" role="dialog" aria-labelledby="cartSuccessModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <p id="cartSuccessModalMessage">Sản phẩm đã được thêm vào giỏ hàng. (<span id="cartSuccessModalTimer">5</span> giây)</p>
            </div>
            <div class="modal-footer">
                <a id="cartSuccessModalLink" href="{{ route('cart.index') }}" class="btn btn-primary">Xem giỏ hàng</a>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
            </div>
        </div>
    </div>
</div>
@endsection
{{-- chọn size --}}
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Lắng nghe sự kiện khi người dùng chọn size
        var sizeButtons = document.querySelectorAll('.btn-size button');
        sizeButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                // Thiết lập giá trị của input số lượng về 1
                document.getElementById('quantityInput').value = 1;
            });
        });
    });
</script>
