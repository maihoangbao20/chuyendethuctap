@extends('layouts.admin')
@section('title','EStore - Trang Quản Trị')

@section('content')
    <style>
        /* Custom CSS styles */
        body {
            font-family: 'Source Sans Pro', sans-serif;
        }
        
        .content-header h1 {
            font-weight: 700;
            font-size: 1.8rem;
        }
        
        .breadcrumb {
            background-color: #f8f9fa;
            border-radius: 0.25rem;
        }
        
        .breadcrumb-item a {
            color: #007bff;
        }
        
        .card {
            border-radius: 0.5rem;
            box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
        }
        
        .card-header {
            background-color: #007bff;
            color: white;
            border-bottom: 1px solid rgba(0, 0, 0, 0.125);
            border-radius: 0.5rem 0.5rem 0 0;
        }
        
        .welcome-message {
            font-size: 1.1rem;
            font-weight: 600;
        }
        
        .card-body {
            padding: 1.5rem;
        }
        
        .welcome-text {
            font-size: 1.2rem;
            margin-bottom: 1rem;
        }
        
        .section-title {
            font-size: 1.4rem;
            font-weight: 600;
            margin-top: 1.5rem;
            border-bottom: 2px solid #007bff;
            padding-bottom: 0.5rem;
        }
        
        .reminder-text,
        .feature-text,
        .support-text {
            margin-top: 0.5rem;
        }
        
        .feature-list,
        .contact-list {
            padding-left: 1.5rem;
        }
    </style>

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Trang Chủ</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('admin') }}">Trang Chủ</a></li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-12 text-right">
                        <span class="welcome-message">Xin chào, admin! <i class="fas fa-hand-holding-volume"></i></span>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <p class="welcome-text">Chào mừng bạn đến với trang quản trị của hệ thống. Trang chủ này cung cấp các tính năng quản trị và thống kê cơ bản.</p>
                <h4 class="section-title">Các Chức Năng Chính: <i class="fas fa-tools"></i></h4>
                <ul class="feature-list">
                    <li>Quản lý người dùng và vai trò 
                        <p>Quản lý thông tin người dùng, cấp quyền và vai trò cho họ.</p>
                    </li>
                    <li>Quản lý danh mục và nội dung 
                        <p>Tạo và quản lý danh mục, nội dung cho hệ thống.</p>
                    </li>
                    <li>Thống kê hoạt động của hệ thống 
                        <p>Xem thống kê, báo cáo về hoạt động của hệ thống.</p>
                    </li>
                </ul>
                <h4 class="section-title">Nhắc Nhở: <i class="fas fa-exclamation-triangle"></i></h4>
                <p class="reminder-text">Hãy đảm bảo bạn duy trì bản sao lưu thường xuyên để đảm bảo an toàn dữ liệu.</p>
                <h4 class="section-title">Tính Năng Mới: <i class="fas fa-lightbulb"></i></h4>
                <p class="feature-text">Bạn có thể sử dụng tính năng mới "Thống kê nhanh" để xem tổng quan về hoạt động gần đây của hệ thống.</p>
                <h4 class="section-title">Hỗ Trợ: <i class="fas fa-life-ring"></i></h4>
                <p class="support-text">Nếu bạn gặp bất kỳ vấn đề nào hoặc cần hỗ trợ, vui lòng liên hệ với bộ phận kỹ thuật của chúng tôi.</p>
                <ul class="contact-list">
                    <li>Email: support@yourcompany.com <i class="fas fa-envelope"></i></li>
                    <li>Điện thoại: 0123-456-789 <i class="fas fa-phone"></i></li>
                </ul>
            </div>
        </div>
    </section>
@endsection
