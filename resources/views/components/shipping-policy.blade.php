@extends('layouts.site')
@section('title', 'EStore - Chính Sách Vận Chuyển')
@section('content')
<link href="{{ asset('css/pageone.css') }}" rel="stylesheet">
<body>
    @include('frontend.header')
    <!-- Breadcrumb Start -->
    <div class="breadcrumb-wrap">
        <div class="container-fluid">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Trang chủ</a></li>
                <li class="breadcrumb-item active">Chính Sách Vận Chuyển</li>
            </ul>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Shipping Policy Start -->
    <div class="shipping-policy-page">
        <div class="container">
            <h1><i class="fa fa-truck"></i> Chính Sách Vận Chuyển</h1>
            <p>Chúng tôi cam kết cung cấp dịch vụ vận chuyển nhanh chóng và an toàn. Dưới đây là các thông tin chi tiết về chính sách vận chuyển của chúng tôi:</p>
            
            <h2><i class="fa fa-truck-loading"></i> Thời Gian Vận Chuyển</h2>
            <p>Thời gian vận chuyển tùy thuộc vào địa điểm giao hàng và phương thức vận chuyển bạn chọn. Chúng tôi sẽ thông báo cho bạn khi đơn hàng được xử lý và khi hàng hóa được gửi đi.</p>
            
            <h2><i class="fa fa-map-marker-alt"></i> Khu Vực Giao Hàng</h2>
            <p>Chúng tôi hỗ trợ giao hàng trên toàn quốc. Đối với các khu vực xa xôi, thời gian giao hàng có thể lâu hơn một chút. Bạn có thể kiểm tra thời gian giao hàng ước tính khi đặt hàng.</p>
            
            <h2><i class="fa fa-box"></i> Phí Vận Chuyển</h2>
            <p>Phí vận chuyển sẽ được tính dựa trên trọng lượng và kích thước của đơn hàng cũng như địa điểm giao hàng. Chúng tôi cung cấp nhiều tùy chọn vận chuyển để bạn có thể chọn lựa theo nhu cầu của mình.</p>
            
            <h2><i class="fa fa-gift"></i> Đơn Hàng Miễn Phí Vận Chuyển</h2>
            <p>Chúng tôi cung cấp dịch vụ giao hàng miễn phí cho đơn hàng trên một mức giá nhất định. Bạn có thể kiểm tra điều kiện miễn phí vận chuyển trên trang web của chúng tôi.</p>
            
            <h2><i class="fa fa-question-circle"></i> Hỗ Trợ Giao Hàng</h2>
            <p>Nếu bạn gặp vấn đề trong quá trình giao hàng hoặc có bất kỳ câu hỏi nào, vui lòng liên hệ với chúng tôi để được hỗ trợ kịp thời.</p>
        </div>
    </div>
    <!-- Shipping Policy End -->

    <!-- Footer Start -->
    @include('frontend.footer')

    <!-- Back to Top -->
    <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
@endsection
