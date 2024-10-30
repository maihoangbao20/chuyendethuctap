@extends('layouts.site')
@section('title', 'EStore - Điều Khoản & Điều Kiện')
@section('content')
<link href="{{ asset('css/pageone.css') }}" rel="stylesheet">
<body>
    @include('frontend.header')
    <!-- Breadcrumb Start -->
    <div class="breadcrumb-wrap">
        <div class="container-fluid">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Trang chủ</a></li>
                <li class="breadcrumb-item active">Điều Khoản & Điều Kiện</li>
            </ul>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Terms & Conditions Start -->
    <div class="terms-page">
        <div class="container">
            <h1><i class="fa fa-file-contract"></i> Điều Khoản & Điều Kiện</h1>
            <p>Bằng việc sử dụng dịch vụ của chúng tôi, bạn đồng ý với các điều khoản và điều kiện sau đây. Nếu bạn không đồng ý với bất kỳ điều khoản nào, vui lòng không sử dụng dịch vụ của chúng tôi.</p>
            
            <h2><i class="fa fa-copyright"></i> Quyền Sở Hữu</h2>
            <p>Tất cả nội dung trên trang web, bao gồm nhưng không giới hạn các văn bản, hình ảnh và đồ họa, thuộc quyền sở hữu của chúng tôi và được bảo vệ bởi luật bản quyền.</p>
            
            <h2><i class="fa fa-tools"></i> Sử Dụng Dịch Vụ</h2>
            <p>Chúng tôi cung cấp dịch vụ theo mô hình "như hiện tại" và không đảm bảo dịch vụ sẽ không bị gián đoạn hoặc không có lỗi. Bạn chịu trách nhiệm về việc bảo mật thông tin tài khoản và mật khẩu của mình.</p>
            
            <h2><i class="fa fa-shopping-cart"></i> Đặt Hàng</h2>
            <p>Khi đặt hàng, bạn cam kết cung cấp thông tin chính xác và đầy đủ. Chúng tôi có quyền từ chối hoặc hủy đơn hàng nếu phát hiện thông tin không chính xác hoặc có dấu hiệu gian lận.</p>
            
            <h2><i class="fa fa-exclamation-triangle"></i> Trách Nhiệm</h2>
            <p>Chúng tôi không chịu trách nhiệm về bất kỳ thiệt hại nào phát sinh từ việc sử dụng dịch vụ của chúng tôi hoặc từ việc không thể truy cập vào dịch vụ.</p>
            
            <h2><i class="fa fa-refresh"></i> Thay Đổi Điều Khoản</h2>
            <p>Chúng tôi có thể cập nhật các điều khoản và điều kiện này bất cứ lúc nào. Bạn nên kiểm tra thường xuyên để cập nhật các thay đổi.</p>
        </div>
    </div>
    <!-- Terms & Conditions End -->

    <!-- Footer Start -->
    @include('frontend.footer')

    <!-- Back to Top -->
    <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
@endsection
