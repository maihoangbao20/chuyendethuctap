@extends('layouts.site')
@section('title', 'EStore - Chính Sách Đổi Trả')
@section('content')
<link href="{{ asset('css/pageone.css') }}" rel="stylesheet">
<body>
    @include('frontend.header')
    <!-- Breadcrumb Start -->
    <div class="breadcrumb-wrap">
        <div class="container-fluid">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Trang chủ</a></li>
                <li class="breadcrumb-item active">Chính Sách Đổi Trả</li>
            </ul>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Return Policy Start -->
    <div class="return-policy-page">
        <div class="container">
            <h1><i class="fa fa-undo"></i> Chính Sách Đổi Trả</h1>
            <p>Chúng tôi cam kết mang đến sự hài lòng cho bạn. Nếu bạn không hài lòng với sản phẩm, bạn có thể yêu cầu đổi trả theo các điều kiện dưới đây:</p>
            
            <h2><i class="fa fa-calendar-alt"></i> Thời Gian Đổi Trả</h2>
            <p>Bạn có thể yêu cầu đổi trả trong vòng 30 ngày kể từ ngày nhận hàng. Đảm bảo rằng sản phẩm còn nguyên trạng và chưa được sử dụng.</p>
            
            <h2><i class="fa fa-tags"></i> Điều Kiện Đổi Trả</h2>
            <p>Sản phẩm phải còn nguyên tem, nhãn mác và bao bì gốc. Chúng tôi không chấp nhận đổi trả đối với các sản phẩm đã qua sử dụng hoặc bị hư hỏng không phải do lỗi của chúng tôi.</p>
            
            <h2><i class="fa fa-check-circle"></i> Quy Trình Đổi Trả</h2>
            <p>Để yêu cầu đổi trả, vui lòng liên hệ với chúng tôi qua email hoặc điện thoại và cung cấp thông tin đơn hàng cùng lý do đổi trả. Chúng tôi sẽ hướng dẫn bạn các bước tiếp theo.</p>
            
            <h2><i class="fa fa-truck"></i> Phí Đổi Trả</h2>
            <p>Chúng tôi sẽ chịu phí vận chuyển cho các đơn hàng đổi trả do lỗi của chúng tôi. Trong trường hợp khác, phí vận chuyển sẽ do khách hàng chịu.</p>
            
            <h2><i class="fa fa-headset"></i> Hỗ Trợ Khách Hàng</h2>
            <p>Nếu bạn cần thêm thông tin hoặc hỗ trợ trong quá trình đổi trả, vui lòng liên hệ với bộ phận chăm sóc khách hàng của chúng tôi để được trợ giúp.</p>
        </div>
    </div>
    <!-- Return Policy End -->

    <!-- Footer Start -->
    @include('frontend.footer')

    <!-- Back to Top -->
    <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
@endsection
