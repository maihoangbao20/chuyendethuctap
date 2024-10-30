@extends('layouts.admin')
@section('title', 'Chỉnh sửa Đơn Hàng')

@section('content')

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Chỉnh sửa Đơn Hàng</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ url('admin') }}">Home</a></li>
          <li class="breadcrumb-item"><a href="{{ route('admin.order.index') }}">Quản Lý Đơn Hàng</a></li>
          <li class="breadcrumb-item active">Chỉnh sửa Đơn Hàng</li>
        </ol>
      </div>
    </div>
  </div>
</section>

<section class="content">
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Chỉnh sửa Đơn Hàng</h3>
    </div>
    <div class="card-body">
      <form action="{{ route('admin.order.update', $order->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="delivery_name">Tên KH</label>
              <input type="text" class="form-control" id="delivery_name" name="delivery_name" value="{{ $order->delivery_name }}" required>
            </div>
            <div class="form-group">
              <label for="delivery_phone">Số Điện Thoại</label>
              <input type="text" class="form-control" id="delivery_phone" name="delivery_phone" value="{{ $order->delivery_phone }}" required>
            </div>
            <div class="form-group">
              <label for="delivery_email">Email</label>
              <input type="email" class="form-control" id="delivery_email" name="delivery_email" value="{{ $order->delivery_email }}" required>
            </div>
            <div class="form-group">
              <label for="delivery_address">Địa chỉ</label>
              <input type="text" class="form-control" id="delivery_address" name="delivery_address" value="{{ $order->delivery_address }}" required>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="status">Trạng thái</label>
              <select class="form-control" id="status" name="status">
                <option value="1" {{ $order->status == 1 ? 'selected' : '' }}>Xuất bản</option>
                <option value="0" {{ $order->status == 0 ? 'selected' : '' }}>Chưa xuất bản</option>
              </select>
            </div>
            <div class="form-group">
              <label for="created_at">Ngày tạo</label>
              <input type="text" class="form-control" id="created_at" value="{{ $order->created_at }}" disabled>
            </div>
            <div class="form-group">
              <label for="updated_at">Ngày cập nhật</label>
              <input type="text" class="form-control" id="updated_at" value="{{ $order->updated_at }}" disabled>
            </div>
          </div>
        </div>
        <div class="card-footer d-flex justify-content-end">
          <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
          <a href="{{ route('admin.order.index') }}" class="btn btn-secondary ml-2">Quay lại</a>
        </div>
      </form>
    </div>
  </div>
</section>

@endsection

<style>
  .form-group {
    margin-bottom: 1.5rem;
  }
  .card-header {
    background-color: #f4f6f9;
    border-bottom: 1px solid #ddd;
    padding: 10px 15px;
  }
  .card-footer {
    background-color: #f4f6f9;
    border-top: 1px solid #ddd;
    padding: 10px 15px;
  }
</style>
