<!-- resources/views/frontend/checkout_message.blade.php -->

@extends('layouts.site')
@section('title', 'Thông báo thanh toán')

@section('content')
    <div class="container mt-5">
        <div class="card shadow">
            <div class="card-header bg-primary text-white">
                <h2 class="text-center">Đơn hàng đã được đặt thành công!</h2>
            </div>
            <div class="card-body">
                @if ($order)
                    <p>Cảm ơn bạn đã đặt hàng tại cửa hàng của chúng tôi. Chúng tôi sẽ liên hệ với bạn trong thời gian sớm nhất.</p>
                    <p>Thông tin đơn hàng của bạn:</p>
                    <ul class="list-unstyled">
                        <li><strong>Tên người nhận:</strong> {{ $order->delivery_name }}</li>
                        <li><strong>Email:</strong> {{ $order->delivery_email }}</li>
                        <li><strong>Số điện thoại:</strong> {{ $order->delivery_phone }}</li>
                        <li><strong>Địa chỉ giao hàng:</strong> {{ $order->delivery_address }}</li>
                        <li><strong>Ghi chú:</strong> {{ $order->note }}</li>
                        <li><strong>Tổng tiền:</strong> {{ number_format($total, 0, ',', '.') }} đ</li>
                    </ul>
                @else
                    <p>No order details found.</p>
                @endif
                <p><a href="{{ url('/') }}" class="btn btn-primary">Quay lại trang chủ</a></p>
            </div>
        </div>
    </div>
@endsection
<style>
.card {
    width: 100%;
    margin: auto;
    max-width: 600px;
    border: 1px solid #ccc;
    border-radius: 8px;
    overflow: hidden;
}

.card-header {
    background-color: #007bff;
    color: #fff;
    padding: 15px;
    text-align: center;
}

/* Phần body của thẻ card */
.card-body {
    padding: 20px;
}

/* Định dạng danh sách thông tin */
.card-body ul {
    list-style-type: none;
    padding: 0;
}

.card-body ul li {
    margin-bottom: 10px;
}

/* Định dạng nút quay lại trang chủ */
.btn-primary {
    background-color: #bed4ec;
    border-color: #007bff;
}

.btn-primary:hover {
    background-color: #0056b3;
    border-color: #0056b3;
}

.btn-primary:focus, .btn-primary.focus {
    box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.5);
}

</style>