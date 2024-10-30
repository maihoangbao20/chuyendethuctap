@extends('layouts.admin')
@section('title', 'Chi Tiết Đơn Hàng')

@section('content')

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Chi Tiết Đơn Hàng</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ url('admin') }}">Home</a></li>
          <li class="breadcrumb-item"><a href="{{ route('admin.order.index') }}">Quản Lý Đơn Hàng</a></li>
          <li class="breadcrumb-item active">Chi Tiết Đơn Hàng</li>
        </ol>
      </div>
    </div>
  </div>
</section>

<section class="content">
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Chi Tiết Đơn Hàng</h3>
    </div>
    <div class="card-body">
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label class="font-weight-bold">Tên KH:</label>
            <p>{{ $order->delivery_name }}</p>
          </div>
          <div class="form-group">
            <label class="font-weight-bold">Số Điện Thoại:</label>
            <p>{{ $order->delivery_phone }}</p>
          </div>
          <div class="form-group">
            <label class="font-weight-bold">Email:</label>
            <p>{{ $order->delivery_email }}</p>
          </div>
          <div class="form-group">
            <label class="font-weight-bold">Địa chỉ:</label>
            <p>{{ $order->delivery_address }}</p>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label class="font-weight-bold">Trạng thái:</label>
            <p>{{ $order->status == 1 ? 'Xuất bản' : 'Chưa xuất bản' }}</p>
          </div>
          <div class="form-group">
            <label class="font-weight-bold">Ngày tạo:</label>
            <p>{{ $order->created_at }}</p>
          </div>
          <div class="form-group">
            <label class="font-weight-bold">Ngày cập nhật
