@extends('layouts.site')
@section('title', 'EStore - Chính Sách Bảo Mật')
@section('content')
<link href="{{ asset('css/pageone.css') }}" rel="stylesheet">
<body>
    @include('frontend.header')
    <!-- Breadcrumb Start -->
    <div class="breadcrumb-wrap">
        <div class="container-fluid">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Trang chủ</a></li>
                <li class="breadcrumb-item active">Chính Sách Bảo Mật</li>
            </ul>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Privacy Policy Start -->
    <div class="privacy-policy-page">
        <div class="container">
            <h1><i class="fa fa-lock"></i> Chính Sách Bảo Mật</h1>
            <p>Chúng tôi cam kết bảo vệ sự riêng tư của bạn. Chính sách bảo mật này mô tả cách chúng tôi thu thập, sử dụng và bảo vệ thông tin cá nhân của bạn khi bạn sử dụng dịch vụ của chúng tôi.</p>
            
            <h2><i class="fa fa-database"></i> Thông Tin Chúng Tôi Thu Thập</h2>
            <p>Chúng tôi thu thập thông tin cá nhân khi bạn đăng ký tài khoản, đặt hàng hoặc liên hệ với chúng tôi. Thông tin này có thể bao gồm tên, địa chỉ email, số điện thoại và địa chỉ giao hàng.</p>
            
            <h2><i class="fa fa-cogs"></i> Cách Chúng Tôi Sử Dụng Thông Tin</h2>
            <p>Chúng tôi sử dụng thông tin cá nhân để xử lý đơn hàng, cung cấp dịch vụ khách hàng và cải thiện trải nghiệm của bạn. Chúng tôi cũng có thể gửi email thông báo và khuyến mãi đến bạn nếu bạn đã đồng ý nhận thông tin từ chúng tôi.</p>
            
            <h2><i class="fa fa-shield-alt"></i> Bảo Mật Thông Tin</h2>
            <p>Chúng tôi thực hiện các biện pháp bảo mật để bảo vệ thông tin cá nhân của bạn khỏi việc truy cập trái phép, sử dụng hoặc tiết lộ. Chúng tôi cũng yêu cầu các đối tác và nhà cung cấp dịch vụ của chúng tôi tuân thủ các biện pháp bảo mật tương tự.</p>
            
            <h2><i class="fa fa-user-shield"></i> Quyền Của Bạn</h2>
            <p>Bạn có quyền truy cập, sửa đổi hoặc xóa thông tin cá nhân của mình. Nếu bạn có bất kỳ câu hỏi nào về chính sách bảo mật của chúng tôi, vui lòng liên hệ với chúng tôi.</p>
        </div>
    </div>
    <!-- Privacy Policy End -->

    <!-- Footer Start -->
    @include('frontend.footer')

    <!-- Back to Top -->
    <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
@endsection
