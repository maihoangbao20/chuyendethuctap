@extends('layouts.admin')
@section('title', 'Quan trọng')

@section('content')
<div class="container">
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Thông Báo Quản Trị</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ url('admin') }}">Trang Chủ</a></li>
                    <li class="breadcrumb-item active">Thông Tin Quản Trị</li>
                </ol>
            </div>
        </div>
    </div>
</section>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">Trang quan trọng</div>

                <div class="card-body">
                    <h4 class="text-danger">Thông báo quan trọng</h4>
                    <p>Đây là trang quan trọng cho phần quản trị backend.</p>

                    <h4 class="text-warning">Cập nhật mới nhất</h4>
                    <p>Chúng tôi đã thêm một số tính năng mới cho hệ thống. Hãy kiểm tra và cập nhật nếu cần thiết.</p>

                    <h4 class="text-success">Quan trọng nhất</h4>
                    <p>Xin hãy đảm bảo bạn thực hiện sao lưu dữ liệu thường xuyên để tránh mất mát dữ liệu không mong muốn.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .card {
        border-radius: 10px;
        margin-top: 20px;
    }
    .card-header {
        font-size: 1.5em;
        font-weight: bold;
        border-bottom: 2px solid #007bff;
    }
    .card-body h4 {
        margin-top: 20px;
        font-weight: bold;
    }
    .card-body p {
        font-size: 1.1em;
        line-height: 1.6;
    }
</style>
@endsection
