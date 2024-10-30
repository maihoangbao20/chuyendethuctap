@extends('layouts.admin')
@section('title','Chi Tiết Danh Mục')

@section('content')

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Chi Tiết Danh Mục</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ url('admin') }}">Home</a></li>
          <li class="breadcrumb-item"><a href="{{ route('admin.category.index') }}">Quản Lý Danh Mục</a></li>
          <li class="breadcrumb-item active">Chi Tiết Danh Mục</li>
        </ol>
      </div>
    </div>
  </div>
</section>

<section class="content">
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Chi Tiết Danh Mục</h3>
    </div>
    <div class="card-body">
      <div class="row">
        <div class="col-md-4">
          <div class="form-group">
            <label class="font-weight-bold">Hình danh mục:</label>
            <div class="img-thumbnail">
              <img src="{{ asset('images/categorys/' . $category->image) }}" class="img-fluid" alt="{{ $category->name }}">
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label class="font-weight-bold">Tên danh mục:</label>
            <p>{{ $category->name }}</p>
          </div>
          <div class="form-group">
            <label class="font-weight-bold">Danh mục cha:</label>
            <p>{{ $parentName }}</p>
          </div>
          <div class="form-group">
            <label class="font-weight-bold">Slug:</label>
            <p>{{ $category->slug }}</p>
          </div>
          <div class="form-group">
            <label class="font-weight-bold">Trạng thái:</label>
            <p>{{ $category->status == 1 ? 'Xuất bản' : 'Chưa xuất bản' }}</p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label class="font-weight-bold">Mô tả:</label>
            <p>{{ $category->description }}</p>
          </div>
          <div class="form-group">
            <label class="font-weight-bold">Sắp xếp:</label>
            <p>{{ $category->sort_order }}</p>
          </div>
          <div class="form-group">
            <label class="font-weight-bold">Ngày tạo:</label>
            <p>{{ $category->created_at }}</p>
          </div>
          <div class="form-group">
            <label class="font-weight-bold">Ngày cập nhật:</label>
            <p>{{ $category->updated_at }}</p>
          </div>
        </div>
      </div>
    </div>
    <div class="card-footer d-flex justify-content-end">
      <a href="{{ route('admin.category.index') }}" class="btn btn-primary mr-2">Quay lại</a>
      <a href="{{ route('admin.category.edit', $category->id) }}" class="btn btn-warning mr-2">Sửa</a>
      <a href="{{ route('admin.category.delete', $category->id) }}" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa danh mục này?')">Xóa</a>
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
