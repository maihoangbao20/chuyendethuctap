@extends('layouts.site')
@section('title', 'EStore - Thông tin tài khoản')
@section('content')

    <body>
    @include('frontend.header')
        <!-- Breadcrumb Bắt đầu -->
        <div class="breadcrumb-wrap">
            <div class="container-fluid">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Trang chủ</a></li>
                    <li class="breadcrumb-item"><a href="{{ url('login') }}">Đăng kí mới</a></li>
                    <li class="breadcrumb-item active">Tài khoản của tôi</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumb Kết thúc -->
        
        <!-- Tài khoản của tôi Bắt đầu -->
        <div class="my-account">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">
                        <div class="nav flex-column nav-pills" role="tablist" aria-orientation="vertical">
                            <a class="nav-link active" id="dashboard-nav" data-toggle="pill" href="#dashboard-tab" role="tab"><i class="fa fa-tachometer-alt"></i>Bảng điều khiển</a>
                            <a class="nav-link" id="orders-nav" data-toggle="pill" href="#orders-tab" role="tab"><i class="fa fa-shopping-bag"></i>Đơn hàng</a>
                            <a class="nav-link" id="payment-nav" data-toggle="pill" href="#payment-tab" role="tab"><i class="fa fa-credit-card"></i>Phương thức thanh toán</a>
                            <a class="nav-link" id="address-nav" data-toggle="pill" href="#address-tab" role="tab"><i class="fa fa-map-marker-alt"></i>Địa chỉ</a>
                            <a class="nav-link" id="account-nav" data-toggle="pill" href="#account-tab" role="tab"><i class="fa fa-user"></i>Chi tiết tài khoản</a>
                            <a class="nav-link" href="{{ route('website.logout') }}"><i class="fa fa-sign-out-alt"></i>Đăng xuất</a>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="dashboard-tab" role="tabpanel" aria-labelledby="dashboard-nav">
                                <h4>Bảng điều khiển</h4>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. In condimentum quam ac mi viverra dictum. In efficitur ipsum diam, at dignissim lorem tempor in. Vivamus tempor hendrerit finibus. Nulla tristique viverra nisl, sit amet bibendum ante suscipit non. Praesent in faucibus tellus, sed gravida lacus. Vivamus eu diam eros. Aliquam et sapien eget arcu rhoncus scelerisque.
                                </p> 
                            </div>
                            <div class="tab-pane fade" id="orders-tab" role="tabpanel" aria-labelledby="orders-nav">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th>STT</th>
                                                <th>Sản phẩm</th>
                                                <th>Ngày</th>
                                                <th>Giá</th>
                                                <th>Trạng thái</th>
                                                <th>Hành động</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Tên sản phẩm</td>
                                                <td>01 Th01 2020</td>
                                                <td>$99</td>
                                                <td>Đã duyệt</td>
                                                <td><button class="btn">Xem</button></td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>Tên sản phẩm</td>
                                                <td>01 Th01 2020</td>
                                                <td>$99</td>
                                                <td>Đã duyệt</td>
                                                <td><button class="btn">Xem</button></td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>Tên sản phẩm</td>
                                                <td>01 Th01 2020</td>
                                                <td>$99</td>
                                                <td>Đã duyệt</td>
                                                <td><button class="btn">Xem</button></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="payment-tab" role="tabpanel" aria-labelledby="payment-nav">
                                <h4>Phương thức thanh toán</h4>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. In condimentum quam ac mi viverra dictum. In efficitur ipsum diam, at dignissim lorem tempor in. Vivamus tempor hendrerit finibus. Nulla tristique viverra nisl, sit amet bibendum ante suscipit non. Praesent in faucibus tellus, sed gravida lacus. Vivamus eu diam eros. Aliquam et sapien eget arcu rhoncus scelerisque.
                                </p> 
                            </div>
                            <div class="tab-pane fade" id="address-tab" role="tabpanel" aria-labelledby="address-nav">
                                <h4>Địa chỉ</h4>
                                <div class="row">
                                    <div class="col-md-6">
                                        <h5>Địa chỉ thanh toán</h5>
                                        <p>123 Đường Thanh Toán, Los Angeles, CA</p>
                                        <p>Điện thoại: 012-345-6789</p>
                                        <button class="btn">Chỉnh sửa địa chỉ</button>
                                    </div>
                                    <div class="col-md-6">
                                        <h5>Địa chỉ giao hàng</h5>
                                        <p>123 Đường Giao Hàng, Los Angeles, CA</p>
                                        <p>Điện thoại: 012-345-6789</p>
                                        <button class="btn">Chỉnh sửa địa chỉ</button>
                                    </div>
                                </div>
                            </div>
                                @if (session('error'))
                                    <div class="alert alert-danger">
                                        {{ session('error') }}
                                    </div>
                                @endif
                            <div class="tab-pane fade show active" id="account-tab" role="tabpanel" aria-labelledby="account-nav">
                                <h4>Chi tiết tài khoản</h4>
                                <form action="{{ route('account_update') }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="col-md-3 text-center">
                                            <img src="{{ $user->avatar ? asset('storage/' . $user->avatar) : asset('img/avatar.jpg') }}" alt="Avatar" class="img-thumbnail" style="width: 150px; height: 150px;">
                                            <input class="form-control mt-2" type="file" name="avatar">
                                        </div>
                                        <div class="col-md-9">
                                            <div class="row">
                                                <div class="col-md-6 mt-2">
                                                    <input class="form-control" type="text" name="name" value="{{ $user->name }}" placeholder="Họ tên">
                                                </div>
                                                <div class="col-md-6 mt-2">
                                                    <input class="form-control" type="text" name="phone" value="{{ $user->phone }}" placeholder="Di động">
                                                </div>
                                                <div class="col-md-12 mt-3">
                                                    <input class="form-control" type="text" name="email" value="{{ $user->email }}" placeholder="Email">
                                                </div>
                                                <div class="col-md-12 mt-3">
                                                    <input class="form-control" type="text" name="address" value="{{ $user->address }}" placeholder="Địa chỉ">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-12">
                                            <button class="btn btn-primary" type="button" id="updateAccountButton">Cập nhật tài khoản</button>
                                        </div>
                                    </div>
                                </form>

                                {{-- @if (session('success'))
                                    <div class="modal fade show" id="cartSuccessModal" tabindex="-1" role="dialog" aria-labelledby="cartSuccessModalLabel" aria-hidden="true" style="display: block;">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-body">
                                                    <p id="cartSuccessModalMessage">{{ session('success') }}</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <a id="cartSuccessModalLink" href="{{ route('login') }}" class="btn btn-primary">Đăng nhập</a>
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div> --}}
                                    {{-- <script>
                                        // Ngăn không cho modal tự động đóng khi nhấp ra ngoài
                                        $('#cartSuccessModal').modal({ backdrop: 'static', keyboard: false });
                                    </script>
                                @endif --}}
                                <h4>Thay đổi mật khẩu</h4>
                                <form action="{{ route('account_changePassword') }}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <!-- Trường username ẩn -->
                                        <input type="text" name="username" value="{{ auth()->user()->email }}" style="display:none;" autocomplete="username">

                                        <div class="col-md-12">
                                            <input type="password" class="form-control" id="current_password_change" name="current_password" required autocomplete="current-password" placeholder="Mật khẩu hiện tại">
                                        </div>
                                        <div class="col-md-6">
                                            <input class="form-control" type="password" name="new_password" placeholder="Mật khẩu mới" required autocomplete="new-password">
                                        </div>
                                        <div class="col-md-6">
                                            <input class="form-control" type="password" name="new_password_confirmation" placeholder="Xác nhận mật khẩu" required autocomplete="new-password">
                                        </div>
                                        <div class="col-md-12">
                                            <button class="btn btn-primary" type="submit">Lưu thay đổi</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Tài khoản của tôi Kết thúc -->
        
    @include('frontend.footer')
        
        <!-- Back to Top -->
        <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Bootstrap JS -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
        <script src="lib/easing/easing.min.js"></script>
        <script src="lib/slick/slick.min.js"></script>
        
        <!-- Template Javascript -->
        <script src="{{asset('js/main.js')}}"></script>
    </body>
<script>
    document.getElementById('updateAccountButton').addEventListener('click', function() {
        $('#passwordRequiredModal').modal('show');
    });
</script>
<script>
    $(document).ready(function() {
        $('#updateAccountButton').click(function() {
            $('#passwordRequiredModal').modal('show');
        });

        $('#passwordRequiredForm').submit(function(e) {
            e.preventDefault();

            var currentPassword = $('#current_password').val().trim();

            if (currentPassword === '') {
                alert('Vui lòng nhập mật khẩu hiện tại.');
                return;
            }

            $.ajax({
                url: $(this).attr('action'),
                type: 'POST',
                data: {
                    current_password: currentPassword,
                    name: $('input[name="name"]').val(),
                    email: $('input[name="email"]').val(),
                    phone: $('input[name="phone"]').val(),
                    address: $('input[name="address"]').val(),
                    _token: $('input[name="_token"]').val(),
                    _method: 'PUT'
                },
                success: function(response) {
                    if (response.success) {
                        $('#passwordRequiredModal').modal('hide');
                        alert(response.message);
                    } else {
                        alert(response.message);
                    }
                },
                error: function(xhr) {
                    if (xhr.status === 400) {
                        alert('Mật khẩu hiện tại không đúng. Vui lòng nhập lại.');
                    } else {
                        alert('Có lỗi xảy ra. Vui lòng thử lại.');
                    }
                }
            });
        });
    });
</script>
{{-- <script>
    $(document).ready(function() {
        // Hiển thị modal nếu có thông báo thành công từ session
        @if(session('success'))
            $('#passwordChangeModal').modal('show');
        @endif
    });
</script> --}}
<!-- Modal Yêu cầu nhập mật khẩu -->
<div class="modal fade" id="passwordRequiredModal" tabindex="-1" role="dialog" aria-labelledby="passwordRequiredModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="passwordRequiredForm" method="POST" action="{{ route('account_update') }}">
                @csrf
                @method('PUT')
                <input type="hidden" name="name" value="{{ $user->name }}">
                <input type="hidden" name="email" value="{{ $user->email }}">
                <input type="hidden" name="phone" value="{{ $user->phone }}">
                <input type="hidden" name="address" value="{{ $user->address }}">
                <input type="hidden" name="avatar" id="update-avatar">
                <div class="modal-header">
                    <h5 class="modal-title" id="passwordRequiredModalLabel">Nhập mật khẩu hiện tại</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="current_password">Mật khẩu hiện tại</label>
                        <input type="password" class="form-control" id="current_password" name="current_password" required autocomplete="current-password">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Xác nhận</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal Thông báo thay đổi mật khẩu thành công -->
{{-- @if (session('success'))
    <div class="modal fade show" id="passwordChangeModal" tabindex="-1" role="dialog" aria-labelledby="passwordChangeModalLabel" aria-hidden="true" style="display: block;">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <p id="passwordChangeModalMessage">{{ session('success') }}</p>
                </div>
                <div class="modal-footer">
                    <a href="{{ route('login') }}" class="btn btn-primary">Đăng nhập</a>
                </div>
            </div>
        </div>
    </div>
    
@endif --}}
<!-- Include Bootstrap JS if not already included -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection
<style>
    .btn {
        margin-bottom : 20px;
    }
    
</style>