@extends('layouts.admin')
@section('title', 'Chỉnh Sửa Liên Hệ')

@section('content')

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Chỉnh Sửa Liên Hệ</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ url('admin') }}">Home</a></li>
          <li class="breadcrumb-item"><a href="{{ route('admin.contact.index') }}">Quản Lý Liên Hệ</a></li>
          <li class="breadcrumb-item active">Chỉnh Sửa Liên Hệ</li>
        </ol>
      </div>
    </div>
  </div>
</section>

<section class="content">
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Chỉnh Sửa Liên Hệ</h3>
    </div>
    <div class="card-body">
      <form action="{{ route('admin.contact.update', $contact->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="name">Tên Khách Hàng:</label>
              <input type="text" name="name" class="form-control" id="name" value="{{ $contact->name }}" required>
            </div>
            <div class="form-group">
              <label for="email">Email:</label>
              <input type="email" name="email" class="form-control" id="email" value="{{ $contact->email }}" required>
            </div>
            <div class="form-group">
              <label for="phone">Số Điện Thoại:</label>
              <input type="text" name="phone" class="form-control" id="phone" value="{{ $contact->phone }}" required>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="content">Nội Dung:</label>
              <textarea name="content" class="form-control" id="content" rows="6" required>{{ $contact->content }}</textarea>
            </div>
            <div class="form-group">
              <label for="status">Trạng Thái:</label>
              <select name="status" class="form-control" id="status">
                <option value="0" {{ $contact->status == 0 ? 'selected' : '' }}>Chưa Xử Lý</option>
                <option value="1" {{ $contact->status == 1 ? 'selected' : '' }}>Đã Xử Lý</option>
              </select>
            </div>
          </div>
        </div>
        <div class="card-footer d-flex justify-content-end">
          <a href="{{ route('admin.contact.index') }}" class="btn btn-secondary mr-2">Hủy</a>
          <button type="submit" class="btn btn-primary">Lưu Thay Đổi</button>
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
  .font-weight-bold {
    font-weight: bold;
  }
</style>
