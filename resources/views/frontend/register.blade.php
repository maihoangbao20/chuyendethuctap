<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <title>E Store - Đăng Ký</title>
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
                <li class="breadcrumb-item"><a href="{{url('/')}}">Trang Chủ</a></li>
                <li class="breadcrumb-item"><a href="{{url('login')}}">Đăng nhập</a></li>
                <li class="breadcrumb-item active">Đăng Ký</li>
            </ul>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Đăng Ký Start -->
    <div class="register">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h3>Đăng ký mới</h3>
                    <form action="{{ route('register') }}" method="POST">
                        @csrf
                        <div class="row">
                            <!-- Cột 1 -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Họ và tên</label>
                                    <input class="form-control" type="text" name="name" placeholder="Họ và tên" value="{{ old('name') }}" required>
                                    @error('name')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Tên đăng nhập</label>
                                    <input class="form-control" type="text" name="username" placeholder="Tên đăng nhập" value="{{ old('username') }}" required autocomplete="username">
                                    @error('username')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Mật khẩu</label>
                                    <small class="password-hint">Gồm 8 kí tự có ít nhất một ký tự chữ hoa, chữ thường, số và ký tự đặc biệt.</small>
                                    <input class="form-control" type="password" name="password" placeholder="Mật khẩu" required autocomplete="new-password" autocomplete="off">
                                    @error('password')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Nhập lại mật khẩu</label>
                                    <input class="form-control" type="password" name="password_confirmation" placeholder="Nhập lại mật khẩu" required autocomplete="new-password" autocomplete="off">
                                </div>
                            </div>
                            <script>
                                window.onload = function() {
                                    document.querySelector('input[name="password"]').value = '';
                                    document.querySelector('input[name="password_confirmation"]').value = '';
                                };
                            </script>
                            <!-- Cột 2 -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Số điện thoại</label>
                                    <input class="form-control" type="text" name="phone" placeholder="Số điện thoại" value="{{ old('phone') }}" required>
                                    @error('phone')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input class="form-control" type="email" name="email" placeholder="Email" value="{{ old('email') }}" required>
                                    @error('email')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Giới tính</label>
                                    <select class="form-control" name="gender" required>
                                        <option value="">Chọn giới tính</option>
                                        <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Nam</option>
                                        <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Nữ</option>
                                        <option value="other" {{ old('gender') == 'other' ? 'selected' : '' }}>Khác</option>
                                    </select>
                                    @error('gender')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                {{-- <div class="form-group">
                                    <label>Địa chỉ</label>
                                    <input class="form-control" type="text" name="address" placeholder="Địa chỉ" value="{{ old('address') }}">
                                    @error('address')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div> --}}
                            </div>
                            <div class="col-md-12">
                                <button class="btn btn-primary" type="submit">Đăng kí</button>
                                <a href="" class="btn btn-facebook"><i class="fab fa-facebook-f"></i> Đăng nhập bằng Facebook</a>
                                <span class="dangki">Bạn đã có tài khoản?</span> <a href="{{ route('login') }}">Đăng nhập ngay <i class="fas fa-hand-point-left"></i></a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Đăng Ký End -->

    @include('frontend.footer')

    <!-- Trở Lại Đầu Trang -->
    <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/slick/slick.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>
</html>
<style>
    .password-hint {
        font-size: 12px; /* Kích thước nhỏ */
        color: green; /* Màu xanh lá */
        display: block; /* Đảm bảo nó hiển thị như một dòng riêng */
    }
    .dangki{
        margin-left:25px;
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
