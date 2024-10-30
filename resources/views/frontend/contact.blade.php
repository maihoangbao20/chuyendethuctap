@extends('layouts.site')
@section('title','EStore - Liên Hệ')
@section('content')

    <body>
    @include('frontend.header')
        <!-- Breadcrumb Start -->
        <div class="breadcrumb-wrap">
            <div class="container-fluid">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/')}}">Trang chủ</a></li>
                    <li class="breadcrumb-item"><a href="{{url('my_account')}}">Tài khoản của tôi</a></li>
                    <li class="breadcrumb-item active">Liên hệ</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumb End -->
        
        <!-- Contact Start -->
        <div class="contact">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="contact-form">
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <h3>Gửi tin nhắn</h3>
                                </div>
                                <div class="col-md-6 text-right">
                                    <a href="{{ route('contact.showcontact') }}" class="btn btn-primary">Xem tin nhắn của tôi</a>
                                </div>
                            </div>
                            <form action="{{ route('contact.store') }}" method="POST" class="contact-form">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <input type="text" name="name" class="form-control" value="{{ old('name') }}" placeholder="Tên của bạn" required />
                                    </div>
                                    <div class="col-md-6">
                                        <input type="email" name="email" class="form-control" value="{{ old('email') }}" placeholder="Email của bạn" required />
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" name="phone" class="form-control" value="{{ old('phone') }}" placeholder="Số điện thoại" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="title" class="form-control" value="{{ old('title') }}" placeholder="Chủ đề" />
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" name="content" rows="5" placeholder="Tin nhắn" required>{{ old('content') }}</textarea>
                                </div>
                                <div><button class="btn" type="submit">Gửi tin nhắn</button></div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="contact-info">
                            <h2>Văn phòng của chúng tôi</h2>
                            <h3><i class="fa fa-map-marker"></i>123 E Store, Quận 9, TP.HCM</h3>
                            <h3><i class="fa fa-envelope"></i>ledanthuan@gmail.com</h3>
                            <h3><i class="fa fa-phone"></i>+123-456-7890</h3>
                            <div class="social">
                                <a href=""><i class="fab fa-twitter"></i></a>
                                <a href=""><i class="fab fa-facebook-f"></i></a>
                                <a href=""><i class="fab fa-linkedin-in"></i></a>
                                <a href=""><i class="fab fa-instagram"></i></a>
                                <a href=""><i class="fab fa-youtube"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="contact-info">
                            <h2>Cửa hàng của chúng tôi</h2>
                            <h3><i class="fa fa-map-marker"></i>123 E Store, Quận 9, TP.HCM</h3>
                            <h3><i class="fa fa-envelope"></i>ledanthuan@gmail.com</h3>
                            <h3><i class="fa fa-phone"></i>+123-456-7890</h3>
                            <div class="social">
                                <a href=""><i class="fab fa-twitter"></i></a>
                                <a href=""><i class="fab fa-facebook-f"></i></a>
                                <a href=""><i class="fab fa-linkedin-in"></i></a>
                                <a href=""><i class="fab fa-instagram"></i></a>
                                <a href=""><i class="fab fa-youtube"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="contact-map">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3918.8785731503944!2d106.77642871428716!3d10.82761499228826!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317527f31fba3ebd%3A0xa576bb84c9d50edb!2zMjAgVOG6oW5nIE5ow7NuIFBow7osIFThuqFvIE5n4buNYywgUXXhuq1uIDksIFRow6BuaCBwaOG7kSBN4bu5biBNaW5oLCBWaWV0bmFt!5e0!3m2!1svi!2s!4v1625597386354!5m2!1svi!2s" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Contact End -->

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
<script>
    $(document).ready(function() {
        // Xử lý khi click vào form thêm vào giỏ hàng
        $(document).on('submit', '.contact-form', function(e) {
            e.preventDefault();

            var form = $(this);
            var url = form.attr('action');

            $.ajax({
                url: url,
                type: 'POST',
                data: form.serialize(),
                success: function(response) {
                    $('#cartSuccessModalMessage').text(response.message);
                    $('#cartSuccessModalLink').attr('href', response.cart_url).text('Xem tin nhắn');
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
                        $('#loginRequiredModalMessage').text('Bạn cần đăng nhập để gửi tin nhắn.'); // Đảm bảo thông báo được cập nhật
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
                        // alert('Có lỗi xảy ra khi gửi tin nhắn');
                    }
                }
            });
        });
    });
</script>
<!-- Modal Yêu cầu đăng nhập -->
<div class="modal fade" id="loginRequiredModal" tabindex="-1" role="dialog" aria-labelledby="loginRequiredModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <p id="loginRequiredModalMessage">Bạn cần đăng nhập để gửi liên hệ. (<span id="loginRequiredModalTimer">5</span> giây)</p>
            </div>
            <div class="modal-footer">
                <a id="loginRequiredModalLink" href="{{ route('login') }}" class="btn btn-primary">Đăng nhập</a>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Thông báo gửi thành công -->
<div class="modal fade" id="cartSuccessModal" tabindex="-1" role="dialog" aria-labelledby="cartSuccessModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <p id="cartSuccessModalMessage">Tin nhắn đã được gửi đi. (<span id="cartSuccessModalTimer">5</span> giây)</p>
            </div>
            <div class="modal-footer">
                <a id="cartSuccessModalLink" href="{{ route('contact.showcontact') }}" class="btn btn-primary">Xem tin nhắn</a>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
            </div>
        </div>
    </div>
</div>
@endsection
