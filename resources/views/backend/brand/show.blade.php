@extends('layouts.admin')
@section('title','Chi Tiết Thương Hiệu')

@section('content')

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Chi Tiết Thương Hiệu</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ url('admin') }}">Home</a></li>
          <li class="breadcrumb-item"><a href="{{ route('admin.brand.index') }}">Quản Lý Thương Hiệu</a></li>
          <li class="breadcrumb-item active">Chi Tiết Thương Hiệu</li>
        </ol>
      </div>
    </div>
  </div>
</section>

<section class="content">
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Chi Tiết Thương Hiệu</h3>
    </div>
    <div class="card-body">
      <div class="row">
        <div class="col-md-4">
          <div class="form-group">
            <label class="font-weight-bold">Ảnh thương hiệu:</label>
            <div class="img-thumbnail">
              <img src="{{ asset('images/brands/' . $brand->image) }}" class="img-fluid" alt="{{ $brand->name }}">
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label class="font-weight-bold">Tên thương hiệu:</label>
            <p>{{ $brand->name }}</p>
          </div>
          <div class="form-group">
            <label class="font-weight-bold">Slug:</label>
            <p>{{ $brand->slug }}</p>
          </div>
          <div class="form-group">
            <label class="font-weight-bold">Trạng thái:</label>
            <p>{{ $brand->status == 1 ? 'Xuất bản' : 'Chưa xuất bản' }}</p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label class="font-weight-bold">Mô tả:</label>
            <p>{{ $brand->description }}</p>
          </div>
          <div class="form-group">
            <label class="font-weight-bold">Ngày tạo:</label>
            <p>{{ $brand->created_at }}</p>
          </div>
          <div class="form-group">
            <label class="font-weight-bold">Ngày cập nhật:</label>
            <p>{{ $brand->updated_at }}</p>
          </div>
        </div>
      </div>
    </div>
    <div class="card-footer d-flex justify-content-end">
      <a href="{{ route('admin.brand.index') }}" class="btn btn-primary mr-2">Quay lại</a>
      <a href="{{ route('admin.brand.edit', $brand->id) }}" class="btn btn-warning mr-2">Sửa</a>
      <a href="{{ route('admin.brand.delete', $brand->id) }}" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa thương hiệu này?')">Xóa</a>
    </div>
  </div>
</section>

@endsection

<style>
  .form-group {
    margin-bottom: 1.5rem;
  }
  .img-thumbnail img {
    max-width: 100%;
    height: auto;
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
