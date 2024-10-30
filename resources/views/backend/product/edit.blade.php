@extends('layouts.admin')
@section('title', 'Chỉnh Sửa Sản Phẩm')

@section('content')
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Chỉnh Sửa Sản Phẩm</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ url('admin') }}">Home</a></li>
          <li class="breadcrumb-item"><a href="{{ route('admin.product.index') }}">Quản Lý Sản Phẩm</a></li>
          <li class="breadcrumb-item active">Chỉnh Sửa Sản Phẩm</li>
        </ol>
      </div>
    </div>
  </div>
</section>

<section class="content">
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Chỉnh Sửa Sản Phẩm</h3>
    </div>
    <div class="card-body">
      <form action="{{ route('admin.product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label class="font-weight-bold">Hình sản phẩm:</label>
              <div class="img-thumbnail mb-2 position-relative">
                <img src="{{ asset('images/products/' . $product->image) }}" class="img-fluid" alt="Không có ảnh">
                <button type="button" class="btn btn-danger btn-sm position-absolute" style="top: 10px; right: 10px;" 
                onclick="event.preventDefault(); document.getElementById('delete-image-form').submit();">
                  <i class="fas fa-times"></i>
                </button>
              </div>
              <input type="file" name="image" class="form-control-file">
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label class="font-weight-bold">Tên sản phẩm:</label>
              <input type="text" name="name" class="form-control" value="{{ $product->name }}" required>
            </div>
            <div class="form-group">
              <label class="font-weight-bold">Danh mục:</label>
              <select name="category_id" class="form-control">
                @foreach ($categories as $category)
                  <option value="{{ $category->id }}" {{ $category->id == $product->category_id ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label class="font-weight-bold">Thương hiệu:</label>
              <select name="brand_id" class="form-control">
                @foreach ($brands as $brand)
                  <option value="{{ $brand->id }}" {{ $brand->id == $product->brand_id ? 'selected' : '' }}>{{ $brand->name }}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label class="font-weight-bold">Mô tả:</label>
              <textarea name="description" class="form-control" rows="5">{{ $product->description }}</textarea>
            </div>
            <div class="form-group">
              <label class="font-weight-bold">Chi tiết:</label>
              <textarea name="detail" class="form-control" rows="5">{{ $product->detail}}</textarea>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label class="font-weight-bold">Giá:</label>
              <input type="number" name="price" class="form-control" value="{{ $product->price }}" required>
            </div>
            <div class="form-group">
              <label class="font-weight-bold">Giá khuyến mãi:</label>
              <input type="number" name="pricesale" class="form-control" value="{{ $product->pricesale }}">
            </div>
            <div class="form-group">
              <label class="font-weight-bold">Trạng thái:</label>
              <select name="status" class="form-control">
                <option value="1" {{ $product->status == 1 ? 'selected' : '' }}>Xuất bản</option>
                <option value="0" {{ $product->status == 0 ? 'selected' : '' }}>Chưa xuất bản</option>
              </select>
            </div>
            <div class="form-group">
              <label class="font-weight-bold">Ngày tạo:</label>
              <p>{{ $product->created_at }}</p>
            </div>
            <div class="form-group">
              <label class="font-weight-bold">Ngày cập nhật:</label>
              <p>{{ $product->updated_at }}</p>
            </div>
          </div>
        </div>
        <div class="card-footer d-flex justify-content-end">
          <a href="{{ route('admin.product.index') }}" class="btn btn-secondary mr-2">Quay lại</a>
          <button type="submit" class="btn btn-success">Lưu</button>
        </div>
      </form>
      <form id="delete-image-form" action="{{ route('admin.product.edit', $product->id) }}" method="GET" style="display: none;">
        @csrf
        <input type="hidden" name="delete_image" value="1">
      </form>
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
