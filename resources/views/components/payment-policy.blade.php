@extends('layouts.site')
@section('title', 'EStore - Chính Sách Thanh Toán')
@section('content')
<link href="{{ asset('css/pageone.css') }}" rel="stylesheet">
<body>
    @include('frontend.header')
    <!-- Breadcrumb Start -->
    <div class="breadcrumb-wrap">
        <div class="container-fluid">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Trang chủ</a></li>
                <li class="breadcrumb-item active">Chính Sách Thanh Toán</li>
            </ul>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Payment Policy Start -->
    <div class="payment-policy-page">
        <div class="container">
            <h1><i class="fa fa-credit-card"></i> Chính Sách Thanh Toán</h1>
            <p>Chúng tôi cung cấp nhiều phương thức thanh toán để bạn có thể chọn lựa tùy theo sự tiện lợi của mình. Dưới đây là các phương thức thanh toán mà chúng tôi hỗ trợ:</p>
            
            <h2><i class="fa fa-money-bill"></i> Thanh Toán Bằng Thẻ Tín Dụng</h2>
            <p>Chúng tôi chấp nhận thẻ tín dụng và thẻ ghi nợ của các ngân hàng lớn. Quy trình thanh toán được bảo mật và mã hóa để đảm bảo an toàn cho thông tin của bạn.</p>
            
            <h2><i class="fa fa-bank"></i> Thanh Toán Qua Chuyển Khoản Ngân Hàng</h2>
            <p>Bạn có thể thanh toán qua chuyển khoản ngân hàng. Sau khi hoàn tất đặt hàng, chúng tôi sẽ gửi thông tin tài khoản ngân hàng để bạn thực hiện chuyển khoản.</p>
            
            <h2><i class="fa fa-cash-register"></i> Thanh Toán Khi Nhận Hàng (COD)</h2>
            <p>Chúng tôi cũng hỗ trợ thanh toán khi nhận hàng. Bạn có thể thanh toán trực tiếp cho nhân viên giao hàng khi nhận được đơn hàng.</p>
            
            <h2><i class="fa fa-paypal"></i> Thanh Toán Qua PayPal</h2>
            <p>Chúng tôi chấp nhận thanh toán qua PayPal. Bạn có thể sử dụng tài khoản PayPal của mình để thực hiện thanh toán một cách nhanh chóng và an toàn.</p>
            
            <h2><i class="fa fa-exclamation-triangle"></i> Thông Báo Quan Trọng</h2>
            <p>Chúng tôi khuyến cáo bạn kiểm tra kỹ lưỡng thông tin đơn hàng trước khi thực hiện thanh toán. Nếu bạn gặp vấn đề trong quá trình thanh toán, vui lòng liên hệ với chúng tôi ngay để được hỗ trợ.</p>
        </div>
    </div>
    <!-- Payment Policy End -->

    <!-- Footer Start -->
    @include('frontend.footer')

    <!-- Back to Top -->
    <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
@endsection
