@extends('layouts.site')
@section('title', 'EStore - Giới Thiệu')
@section('content')
<link href="{{ asset('css/pageone.css') }}" rel="stylesheet">
<body>
    @include('frontend.header')
    <!-- Breadcrumb Start -->
    <div class="breadcrumb-wrap">
        <div class="container-fluid">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Trang chủ</a></li>
                <li class="breadcrumb-item active">Giới Thiệu</li>
            </ul>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- About Start -->
    <div class="about-page">
        <div class="container">
            <h1><i class="fa fa-info-circle"></i> Giới Thiệu Về Chúng Tôi</h1>
            <p>Chúng tôi là một công ty thương mại điện tử hàng đầu tại Việt Nam, chuyên cung cấp các sản phẩm chất lượng cao với giá cả hợp lý. Chúng tôi cam kết mang đến cho khách hàng những trải nghiệm mua sắm tốt nhất với dịch vụ chăm sóc khách hàng tận tâm.</p>
            
            <h2><i class="fa fa-history"></i> Lịch Sử Thành Lập</h2>
            <p>Được thành lập vào năm 2020, chúng tôi đã không ngừng mở rộng và phát triển để trở thành một trong những nền tảng thương mại điện tử đáng tin cậy nhất. Với đội ngũ nhân viên nhiệt huyết và chuyên nghiệp, chúng tôi luôn sẵn sàng phục vụ và đáp ứng nhu cầu của khách hàng.</p>
            
            <h2><i class="fa fa-bullseye"></i> Sứ Mệnh & Tầm Nhìn</h2>
            <p>Sứ mệnh của chúng tôi là cung cấp các sản phẩm chất lượng và dịch vụ khách hàng xuất sắc. Chúng tôi không ngừng tìm kiếm và phát triển các sản phẩm mới để đáp ứng nhu cầu ngày càng cao của khách hàng. Tầm nhìn của chúng tôi là trở thành một trong những công ty thương mại điện tử hàng đầu tại châu Á.</p>
            
            <h2><i class="fa fa-star"></i> Giá Trị Cốt Lõi</h2>
            <ul>
                <li><i class="fa fa-check-circle"></i> <strong>Chất lượng:</strong> Chúng tôi cam kết cung cấp sản phẩm chất lượng cao nhất.</li>
                <li><i class="fa fa-check-circle"></i> <strong>Khách hàng:</strong> Khách hàng là trung tâm của mọi hoạt động của chúng tôi.</li>
                <li><i class="fa fa-check-circle"></i> <strong>Đổi mới:</strong> Chúng tôi luôn tìm kiếm cách để cải tiến và đổi mới.</li>
                <li><i class="fa fa-check-circle"></i> <strong>Trách nhiệm:</strong> Chúng tôi chịu trách nhiệm về các sản phẩm và dịch vụ của mình.</li>
            </ul>
        </div>
    </div>
    <!-- About End -->

    <!-- Footer Start -->
    @include('frontend.footer')

    <!-- Back to Top -->
    <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
@endsection
