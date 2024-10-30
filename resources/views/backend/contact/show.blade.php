@extends('layouts.admin')
@section('title', 'Chi Tiết Liên Hệ')

@section('content')

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Chi Tiết Liên Hệ</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ url('admin') }}">Home</a></li>
          <li class="breadcrumb-item"><a href="{{ route('admin.contact.index') }}">Quản Lý Liên Hệ</a></li>
          <li class="breadcrumb-item active">Chi Tiết Liên Hệ</li>
        </ol>
      </div>
    </div>
  </div>
</section>

<section class="content">
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Chi Tiết Liên Hệ</h3>
    </div>
    <div class="card-body">
      <div class="row">
        <div class="col-md-4">
          <div class="form-group">
            <label class="font-weight-bold">Tên Khách Hàng:</label>
            <p>{{ $contact->name }}</p>
          </div>
          <div class="form-group">
            <label class="font-weight-bold">Email:</label>
            <p>{{ $contact->email }}</p>
          </div>
          <div class="form-group">
            <label class="font-weight-bold">Số Điện Thoại:</label>
            <p>{{ $contact->phone }}</p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label class="font-weight-bold">Nội Dung:</label>
            <p>{{ $contact->content }}</p>
          </div>
          <div class="form-group">
            <label class="font-weight-bold">Trạng Thái:</label>
            <p>{{ $contact->status == 1 ? 'Đã xử lý' : 'Chưa xử lý' }}</p>
          </div>
        </div>
        <div class="col-md-4 ">
          <div class="form-group">
            <label class="font-weight-bold">Ngày Tạo:</label>
            <p>{{ $contact->created_at }}</p>
          </div>
          <div class="form-group">
            <label class="font-weight-bold">Ngày Cập Nhật:</label>
            <p>{{ $contact->updated_at }}</p>
          </div>
        </div>
      </div>
    </div>
    <div class="card-footer d-flex justify-content-end">
      <a href="{{ route('admin.contact.index') }}" class="btn btn-primary mr-2">Quay lại</a>
      <a href="{{ route('admin.contact.edit', $contact->id) }}" class="btn btn-warning mr-2">Sửa</a>
      <a href="{{ route('admin.contact.delete', $contact->id) }}" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa liên hệ này?')">Xóa</a>
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
  .font-weight-bold {
    font-weight: bold;
  }
</style>
