<!DOCTYPE html>
<html lang="vi">
    <head>
        <meta charset="utf-8">
        <title>E Store - Đăng Nhập/Đăng Kí</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="eCommerce HTML Template Free Download" name="keywords">
        <meta content="eCommerce HTML Template Free Download" name="description">

        <!-- Favicon -->
        <link href="img/favicon.ico" rel="icon">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400|Source+Code+Pro:700,900&display=swap" rel="stylesheet">

        <!-- CSS Libraries -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <link href="lib/slick/slick.css" rel="stylesheet">
        <link href="lib/slick/slick-theme.css" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="{{ asset('css/style-all.css') }}" rel="stylesheet">
    </head>

    <body>
    @include('frontend.header')
        @if (session('alert'))
            <div class="alert alert-warning">
                {{ session('alert') }}
            </div>
        @endif
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Breadcrumb Start -->
        <div class="breadcrumb-wrap">
            <div class="container-fluid">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Trang Chủ</a></li>
                    <li class="breadcrumb-item"><a href="#">Sản Phẩm</a></li>
                    <li class="breadcrumb-item active">Đăng Nhập & Đăng Ký</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumb End -->
        
    <div class="login">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <h3>Đăng nhập</h3>
                    <form action="{{ route('website.dologin') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="username">E-mail / Tên Đăng Nhập</label>
                            <input type="text" id="username" name="username" class="form-control" placeholder="Tên đăng nhập hoặc email" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Mật Khẩu</label>
                            <input type="password" id="password" name="password" class="form-control" placeholder="Mật khẩu" required>
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="newaccount">
                                <label class="custom-control-label" for="newaccount">Giữ tôi đăng nhập</label>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Đăng nhập</button>
                        <a href="" class="btn btn-facebook"><i class="fab fa-facebook-f"></i> Đăng nhập bằng Facebook</a>
                        <span class="dangki">Bạn chưa có tài khoản?</span> <a href="{{ route('register') }}">Đăng kí ngay <i class="fas fa-hand-point-left"></i></a>
                    </form>
                </div>
            </div>
        </div>
    </div>    @include('frontend.footer')
        
        <!-- Trở Lại Đầu Trang -->
        <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
        
        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
        <script src="lib/easing/easing.min.js"></script>
        <script src="lib/slick/slick.min.js"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <!-- Template Javascript -->
        <script src="js/main.js"></script>
    </body>
</html>
<style>
    .dangki{
        margin-left:45px;
    }
    .alert {
        margin-left:20px;
        margin-right:20px;
    }
    .btn-facebook {
        background-color: #32aedf;
        color: white;
        border: none;
        padding: 10px 20px;
        text-align: center;
        font-size: 12px;
        margin: 10px 0;
        cursor: pointer;
        text-decoration: none;
    }

    .btn-facebook:hover {
        background-color: #3b558e;
        color: white;
    }

    .btn-facebook i {
        margin-right: 8px;
    }
</style>