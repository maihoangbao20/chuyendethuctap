@extends('layouts.site')
@section('title', 'EStore - ' . $category->name)
@section('content')
    <body>
        @include('frontend.header')
        <!-- Breadcrumb Start -->
        <div class="breadcrumb-wrap">
            <div class="container-fluid">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Trang chủ</a></li>
                    <li class="breadcrumb-item"><a href="{{ url('product') }}">Sản phẩm</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('category.products', ['id' => $category->id]) }}">{{ $category->name }}</a></li>
                    <li class="breadcrumb-item">
                        <h1 class="breadcrumb-title">{{ $category->name }}</h1>
                    </li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumb End -->
        
        <!-- Product List Start -->
        <div class="product-view">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="product-view-top">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="product-search">
                                                <input type="email" value="Tìm kiếm">
                                                <button><i class="fa fa-search"></i></button>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="product-short">
                                                <div class="dropdown">
                                                    <div class="dropdown-toggle" data-toggle="dropdown">Sắp xếp theo</div>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a href="#" class="dropdown-item">Mới nhất</a>
                                                        <a href="#" class="dropdown-item">Phổ biến</a>
                                                        <a href="#" class="dropdown-item">Bán chạy nhất</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="product-price-range">
                                                <div class="dropdown">
                                                    <div class="dropdown-toggle" data-toggle="dropdown">Khoảng giá sản phẩm</div>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a href="#" class="dropdown-item">$0 đến $50</a>
                                                        <a href="#" class="dropdown-item">$51 đến $100</a>
                                                        <a href="#" class="dropdown-item">$101 đến $150</a>
                                                        <a href="#" class="dropdown-item">$151 đến $200</a>
                                                        <a href="#" class="dropdown-item">$201 đến $250</a>
                                                        <a href="#" class="dropdown-item">$251 đến $300</a>
                                                        <a href="#" class="dropdown-item">$301 đến $350</a>
                                                        <a href="#" class="dropdown-item">$351 đến $400</a>
                                                        <a href="#" class="dropdown-item">$401 đến $450</a>
                                                        <a href="#" class="dropdown-item">$451 đến $500</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="product-categories">
                                                <div class="dropdown">
                                                    <div class="dropdown-toggle" data-toggle="dropdown">Danh mục sản phẩm</div>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        @foreach($categories as $cat)
                                                        <a href="{{ route('category.products', ['id' => $cat->id]) }}" class="dropdown-item">{{ $cat->name }}</a>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="product-brands">
                                                <div class="dropdown">
                                                    <div class="dropdown-toggle" data-toggle="dropdown">Thương hiệu sản phẩm</div>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        @foreach($brands as $brand)
                                                        <a href="{{ route('brand.products', ['id' => $brand->id]) }}" class="dropdown-item">{{ $brand->name }}</a>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        {{-- pagination--}}
                        <div class="col-md-12 d-flex justify-content-center" style="margin-top: 0; margin-bottom: 10px;">
                            {{ $products->links('frontend.pagination') }}
                        </div>
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            @foreach($products as $product)
                                            <div class="col-lg-3">
                                                <div class="product-item">
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
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <!-- Pagination -->
                                <div class="d-flex justify-content-center">
                                    {{ $products->links('frontend.pagination') }}
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Side Bar Start -->
                    <div class="col-lg-4 sidebar">
                        <!-- Categories -->
                        <div class="sidebar-widget category">
                            <h2>Categories</h2>
                            <ul class="list-group">
                                @foreach($categories as $cat)
                                <li class="list-group-item">
                                    <a href="{{ route('category.products', ['id' => $cat->id]) }}">{{ $cat->name }}</a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        <!-- Product Slider -->
                        <div class="sidebar-widget widget-slider">
                            <div class="sidebar-slider normal-slider">
                                @foreach($products as $product)
                                <div class="product-item sidebar-product-item">
                                    <div class="product-title">
                                            <a href="{{ route('product_detail', ['id' => $product->id]) }}">{{ $product->name }}</a>
                                            {{-- <div class="ratting">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div> --}}
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
                        <!-- Brands -->
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
                        <!-- Tags -->
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
        <!-- Product List End -->
            <!-- Brand Start -->
            <div class="brand">
                <div class="container-fluid">
                    <div class="brand-slider">
                        <div class="brand-item"><img src="{{asset('img/brand-1.png')}}" alt=""></div>
                        <div class="brand-item"><img src="{{asset('img/brand-2.png')}}" alt=""></div>
                        <div class="brand-item"><img src="{{asset('img/brand-3.png')}}" alt=""></div>
                        <div class="brand-item"><img src="{{asset('img/brand-4.png')}}" alt=""></div>
                        <div class="brand-item"><img src="{{asset('img/brand-5.png')}}" alt=""></div>
                        <div class="brand-item"><img src="{{asset('img/brand-6.png')}}" alt=""></div>
                    </div>
                </div>
            </div>
            <!-- Brand End -->
        @include('frontend.footer')
            <!-- Back to Top -->
            <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
            
            <!-- JavaScript Libraries -->
            <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
            <script src="{{asset('lib/easing/easing.min.js')}}"></script>
            <script src="{{asset('lib/slick/slick.min.js')}}"></script>
            
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
<style>
    #wishlistModalTimer,
    #cartSuccessModalTimer {
        font-size: 1.2em;
        font-weight: bold;
        color: #f00; /* Màu sắc của thời gian đếm ngược */
    }
    .breadcrumb-title {
        display: inline;
        font-family: "Brush Script MT", cursive;
        font-size: 40px;
        /* font-weight: bold; */
        /* margin-top: 0px; */
        /* margin: 0; */
        /* padding: 0; */
        /* text-shadow: 0 4px 0 #f4f2f2, 0 7px 0 rgb(243, 100, 10); */
        /* text-align: center; */
    }
    .brand-item {
        max-height: 75px;
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
        height: 250px; /* Set fixed height for product image */
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
        min-height: 100px;
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
    /* Specific styles for sidebar product items */
    .sidebar-product-item {
        padding: 15px; /* Add padding specific to sidebar items */
        margin-bottom: 20px; /* Add margin bottom specific to sidebar items */
        height: auto;
        max-height: 500px;
    }

    .sidebar-product-item .product-title a {
        font-size: 16px; /* Adjust font size for sidebar items */
        max-height: 55px; /* Adjust max height for sidebar items */
    }

    .sidebar-product-item .product-image {
        height: 350px; /* Adjust height for sidebar items */
    }

    .sidebar-product-item .product-price h3 {
        font-size: 20px; /* Adjust font size for sidebar items */
    }

    .sidebar-product-item .product-price .btn {
        padding: 5px 10px; /* Adjust padding for sidebar items */
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
</style>