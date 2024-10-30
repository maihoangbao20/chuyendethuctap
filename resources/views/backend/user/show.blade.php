@extends('layouts.admin')
@section('title', 'Chi Tiết Người Dùng')

@section('content')

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Chi Tiết Người Dùng</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ url('admin') }}">Home</a></li>
          <li class="breadcrumb-item"><a href="{{ route('admin.user.index') }}">Quản Lý Người Dùng</a></li>
          <li class="breadcrumb-item active">Chi Tiết Người Dùng</li>
        </ol>
      </div>
    </div>
  </div>
</section>

<section class="content">
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Chi Tiết Người Dùng</h3>
    </div>
    <div class="card-body">
      <div class="row">
        <div class="col-md-4">
          <div class="form-group">
            <label class="font-weight-bold">Tên người dùng:</label>
            <p>{{ $user->name }}</p>
          </div>
          <div class="form-group">
            <label class="font-weight-bold">Tên đăng nhập:</label>
            <p>{{ $user->username }}</p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label class="font-weight-bold">Điện thoại:</label>
            <p>{{ $user->phone }}</p>
          </div>
          <div class="form-group">
            <label class="font-weight-bold">Email:</label>
            <p>{{ $user->email }}</p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label class="font-weight-bold">Địa chỉ:</label>
            <p>{{ $user->address }}</p>
          </div>
          <div class="form-group">
            <label class="font-weight-bold">Vai trò:</label>
            <p>{{ $user->roles }}</p>
          </div>
          <div class="form-group">
            <label class="font-weight-bold">Trạng thái:</label>
            <p>{{ $user->status == 1 ? 'Hoạt động' : 'Ngừng hoạt động' }}</p>
          </div>
        </div>
      </div>
    </div>
    <div class="card-footer d-flex justify-content-end">
      <a href="{{ route('admin.user.index') }}" class="btn btn-primary mr-2">Quay lại</a>
      <a href="{{ route('admin.user.edit', $user->id) }}" class="btn btn-warning mr-2">Sửa</a>
      <a href="{{ route('admin.user.delete', $user->id) }}" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa người dùng này?')">Xóa</a>
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
