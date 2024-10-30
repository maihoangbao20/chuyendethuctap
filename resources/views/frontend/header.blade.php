        <!-- Top bar Start --> 
        <div class="top-bar">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <i class="fa fa-envelope"></i>
                        ledanthuan@email.com
                    </div>
                    <div class="col-sm-6">
                        <i class="fa fa-phone-alt"></i>
                        +012-345-6789
                    </div>
                </div>
            </div>
        </div>
        <!-- Top bar End -->
        
        <!-- Nav Bar Start -->
        <div class="nav">
            <div class="container-fluid">
                <nav class="navbar navbar-expand-md bg-dark navbar-dark">
                    <a href="#" class="navbar-brand">MENU</a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto">
                            <a href="{{url('/') }}" class="nav-item nav-link {{ Request::is('/') ? 'active' : '' }}">Trang Chủ</a>
                            <a href="{{url('product')}}" class="nav-item nav-link {{ Request::is('product') ? 'active' : '' }}">Tất cả sản Phẩm</a>
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Sản Phẩm Khác</a>
                                <div class="dropdown-menu">
                                    <a href="{{url('product_sale')}}" class="dropdown-item {{ Request::is('product_sale') ? 'active' : '' }}">Sản Phẩm Khuyến Mãi</a>
                                    <a href="{{url('product_news')}}" class="dropdown-item {{ Request::is('prosuct_news') ? 'active' : '' }}">Sản Phẩm Mới Nhất</a>
                                </div>
                            </div>
                            <a href="{{url('cart') }}" class="nav-item nav-link {{ Request::is('cart') ? 'active' : '' }}">Giỏ Hàng</a>
                            <a href="{{url('checkout')}}" class="nav-item nav-link {{ Request::is('checkout') ? 'active' : '' }}">Thanh Toán</a>
                            <a href="{{url('my_account')}}" class="nav-item nav-link {{ Request::is('my_account') ? 'active' : '' }}">Tài Khoản Của Tôi</a>
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Trang Khác</a>
                                <div class="dropdown-menu">
                                    <a href="{{url('wishlist')}}" class="dropdown-item {{ Request::is('wishlist') ? 'active' : '' }}">Danh Sách Yêu Thích</a>
                                    <a href="{{url('login')}}" class="dropdown-item {{ Request::is('login') ? 'active' : '' }}">Đăng Nhập & Đăng Ký</a>
                                    <a href="{{url('contact')}}" class="dropdown-item {{ Request::is('contact') ? 'active' : '' }}">Liên Hệ</a>
                                </div>
                            </div>
                        </div>
                        <div class="navbar-nav ml-auto">
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Tài Khoản Người Dùng</a>
                                <div class="dropdown-menu">
                                    @if (Auth::check())
                                        <a href="{{ route('website.logout') }}" class="dropdown-item">Đăng Xuất</a>
                                        <a href="{{ url('register') }}" class="dropdown-item {{ Request::is('register') ? 'active' : '' }}">Đăng Ký Mới</a>
                                    @else
                                        <a href="{{ route('login') }}" class="dropdown-item {{ Request::is('login') ? 'active' : '' }}">Đăng Nhập</a>
                                        <a href="{{ url('register') }}" class="dropdown-item {{ Request::is('register') ? 'active' : '' }}">Đăng Ký Mới</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <!-- Nav Bar End -->
        <!-- Bottom Bar Start -->
        <div class="bottom-bar">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-md-3">
                        <div class="logo">
                            <a href="{{url('/')}}">
                                <img src="{{ asset('img/logo.png') }}" alt="Logo">
                            </a>
                        </div>
                    </div>
                    <div class="search col-md-6">
                        <form action="{{ url('search') }}" method="GET">
                            <input type="text" name="query" placeholder="Tìm kiếm . . ." value="{{ request()->get('query') }}">
                            <button type="submit"><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                    <div class="col-md-3">
                        <div class="user">
                            <a href="{{ url('wishlist') }}" class="btn wishlist">
                                <i class="fa fa-heart"></i>
                                <span>({{ $wishlistItemCount }})</span>
                            </a>
                            <a href="{{ url('cart') }}" class="btn cart">
                                <i class="fa fa-shopping-cart"></i>
                                <span>({{ $cartItemCount }})</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Bottom Bar End -->