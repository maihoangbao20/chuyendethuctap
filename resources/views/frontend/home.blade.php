@extends('layouts.site')
@section('title','EStore - Trang chủ')
@section('content')

    <body>
<style>
    
    .newsletter {
        position: relative;
        padding: 10px 0;
        background: #f17569;
    }
    .newsletter h1 {
        color: #ffffff;
        font-size: 20px;
        margin: 0;
        margin-top:10px;
    }
    .call-to-action {
        position: relative;
        padding: 10px 0;
        background: #f17569;
    }
    .call-to-action h1 {
        color: #ffffff;
        font-size: 20px;
        margin: 0;
        margin-top:10px;
    }
    .feature .feature-col {
        margin-bottom: 30px;
    }
    .feature .feature-content i {
        color: #FF6F61;
        font-size: 40px;
        margin-bottom: 0px;
    }
    #wishlistModalTimer,
    #cartSuccessModalTimer {
        font-size: 1.2em;
        font-weight: bold;
        color: #f00; /* Màu sắc của thời gian đếm ngược */
    }

        .img-item {
            position: relative;
            margin-bottom: 15px;
        }
        .img-item img {
            width: 100%;
            height: auto;
        }
        .img-text {
            position: absolute;
            bottom: 10px;
            left: 10px;
            color: white;
            background-color: rgba(0, 0, 0, 0.5);
            padding: 5px 10px;
            border-radius: 5px;
        }
    .review {
        max-height: 200px;
    }
    .col-lg-3 {
        max-height: 600px;
    }
    .brand-item {
        max-height: 75px;
    }
        /* Styles for price */
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
        max-height: 300px;
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
        
        <!-- Main Slider Start -->
        <div class="header">
            <div class="container-fluid">
                <div class="row">
            <div class="col-md-3">
                <nav class="navbar bg-light" style="height: 500px; overflow-y: auto;">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('/')}}"><i class="fa fa-home"></i>Trang Chủ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('product_news')}}"><i class="fa fa-plus-square"></i>Hàng Mới Về</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('product_sale')}}"><i class="fa fa-shopping-bag"></i>Sản Phẩm Khuyến Mãi</a>
                        </li>
                        {{-- <li class="nav-item">
                            <a class="nav-link" href="#"><i class="fa fa-female"></i>Thời Trang & Làm Đẹp</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="fa fa-child"></i>Quần Áo Trẻ Em</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="fa fa-tshirt"></i>Quần Áo Nam & Nữ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="fa fa-mobile-alt"></i>Thiết Bị & Phụ Kiện</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="fa fa-microchip"></i>Điện Tử & Phụ Kiện</a>
                        </li> --}}
                        @foreach($categories as $category)
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('category.products', ['id' => $category->id]) }}">
                                    <i class="fa {{ $category->icon_class }}">>></i>{{ $category->name }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </nav>
            </div>
        <div class="col-md-6">
                        <div class="header-slider normal-slider">
                            <div class="header-slider-item">
                                <img src="img/slider_1.jpg" alt="Slider Image" />
                                <div class="header-slider-caption">
                                    <p>Sản Phẩm Mới Nhất</p>
                                    <a class="btn" href="{{url('product_news')}}"><i class="fa fa-shopping-cart"></i>Shop Now</a>
                                </div>
                            </div>
                            <div class="header-slider-item">
                                <img src="img/slider_2.jpg" alt="Slider Image" />
                                <div class="header-slider-caption">
                                    <p>FlashSale <i class="fas fa-fire"></i> </p>
                                    <a class="btn" href="{{url('product_sale')}}"><i class="fa fa-shopping-cart"></i>Shop Now</a>
                                </div>
                            </div>
                            <div class="header-slider-item">
                                <img src="img/slider3.jpg" alt="Slider Image" />
                                <div class="header-slider-caption">
                                    <p>Sản Phẩm Khuyến Mãi</p>
                                    <a class="btn" href="{{url('product_sale')}}"><i class="fa fa-shopping-cart"></i>Shop Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- category --}}
                <div class="col-md-3">
                    <div class="header-img brand-list" style="height: 500px; overflow-y: auto;">
                        @foreach($brands as $brand)
                            <div class="img-item">
                                <img src="{{ asset('img/brands/' . $brand->image) }}" alt="{{ $brand->name }}" />
                                <a class="img-text" href="{{ route('brand.products', ['id' => $brand->id]) }}">
                                    <p>Thương hiệu : {{ $brand->name }}</p>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
        </div>
            </div>
        </div>
        <!-- Main Slider End -->
        
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
        <!-- Feature Start-->
        <div class="feature">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-6 feature-col">
                        <a href="{{ route('payment-policy') }}">
                        <div class="feature-content">
                            <i class="fab fa-cc-mastercard"></i>
                            <h2>Thanh Toán An Toàn</h2>
                            <p>
                            </p>
                        </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-6 feature-col">
                        <a href="{{ route('shipping-policy') }}">
                        <div class="feature-content">
                            <i class="fa fa-truck"></i>
                            <h2>Giao Hàng Toàn Cầu</h2>
                            <p>
                            </p>
                        </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-6 feature-col">
                        <a href="{{ route('return-policy') }}">
                        <div class="feature-content">
                            <i class="fa fa-sync-alt"></i>
                            <h2>Đổi Trả Trong 90 Ngày</h2>
                            <p>
                            </p>
                        </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-6 feature-col">
                        <a href="{{url('contact')}}">
                        <div class="feature-content">
                            <i class="fa fa-comments"></i>
                            <h2>Hỗ Trợ 24/7</h2>
                            <p>
                                {{-- Hỗ trợ khách hàng nhanh chóng mọi lúc, mọi nơi, 24/7 --}}
                            </p>
                        </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Feature End-->
        <!-- Category Start-->
        <!-- Category End-->
        <!-- Call to Action Start -->
        <div class="call-to-action">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <h1>Liên hệ chúng tôi nếu cần tư vấn</h1>
                    </div>
                    <div class="col-md-6">
                        <a href="tel:0123456789">+012-345-6789</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Call to Action End -->
        <!-- Featured Product Start -->
        <div class="featured-product product">
            <div class="container-fluid">
                <div class="section-header">
                    <h1><a href="{{ route('product_sale') }}">Flash Sale <i class="fas fa-fire"></i> <<</a></h1>
                </div>
                <div class="row align-items-center product-slider product-slider-4">
                    @foreach($productsale as $product)
                    <div class="col-lg-3">
                        <div class="product-item">
                            <div class="product-title">
                                <a href="{{ route('product_detail', ['id' => $product->id]) }}">{{ $product->name }}</a>
                                <div class="ratting">
                                    <!-- Đánh giá sao của sản phẩm -->
                                    <!-- Bổ sung các icon sao tương ứng với đánh giá của sản phẩm -->
                                </div>
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
                                        <form action="{{ route('add.to.cart', ['product' => $product->id]) }}" method="POST" class="cart-form">
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
        <!-- Featured Product End -->
        
        <!-- Newsletter Start -->
        <div class="newsletter">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <h1>Đăng ký nhận bản tin của chúng tôi</h1>
                    </div>
                    <div class="col-md-6">
                        <div class="form">
                            <input type="email" value="Nhập email của bạn">
                            <button>Gửi</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Newsletter End -->
        
        <!-- Recent Product Start -->
        <div class="recent-product product">
            <div class="container-fluid">
                <div class="section-header">
                    <h1><a href="{{ route('product_news') }}">Sản phẩm gần đây <i class="fas fa-hand-point-left"></i></a></h1>
                </div>
                <div class="row align-items-center product-slider product-slider-4">
                    @foreach($productnews as $product)
                    <div class="col-lg-3">
                        <div class="product-item">
                            <div class="product-title">
                                <a href="{{ route('product_detail', ['id' => $product->id]) }}">{{ $product->name }}</a>
                                <div class="ratting">
                                    <!-- Đánh giá sao của sản phẩm -->
                                    <!-- Bổ sung các icon sao tương ứng với đánh giá của sản phẩm -->
                                </div>
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
        <!-- Recent Product End -->

        <!-- Review Start -->
        {{-- <div class="review">
            <div class="container-fluid">
                <div class="row align-items-center review-slider normal-slider">
                    <div class="col-md-6">
                        <div class="review-slider-item">
                            <div class="review-img">
                                <img src="img/review-1.jpg" alt="Hình ảnh">
                            </div>
                            <div class="review-text">
                                <h2>Nguyễn Văn A</h2>
                                <h3>Nhân Viên Văn Phòng</h3>
                                <div class="ratting">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur vitae nunc eget leo finibus luctus et vitae lorem.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="review-slider-item">
                            <div class="review-img">
                                <img src="img/review-2.jpg" alt="Hình ảnh">
                            </div>
                            <div class="review-text">
                                <h2>Trần Thị B</h2>
                                <h3>Giáo Viên</h3>
                                <div class="ratting">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur vitae nunc eget leo finibus luctus et vitae lorem.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="review-slider-item">
                            <div class="review-img">
                                <img src="img/review-3.jpg" alt="Hình ảnh">
                            </div>
                            <div class="review-text">
                                <h2>Lê Văn C</h2>
                                <h3>Kỹ Sư</h3>
                                <div class="ratting">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur vitae nunc eget leo finibus luctus et vitae lorem.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
        <!-- Review End -->
    @include('frontend.footer')
        <!-- Back to Top -->
        <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
        
        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
        <script src="lib/easing/easing.min.js"></script>
        <script src="lib/slick/slick.min.js"></script>
        
        <!-- Template Javascript -->
        <script src="js/main.js"></script>
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
