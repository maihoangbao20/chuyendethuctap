@extends('layouts.admin')
@section('title','Chỉnh Sửa Thương Hiệu')

@section('content')

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Chỉnh Sửa Thương Hiệu</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ url('admin') }}">Home</a></li>
          <li class="breadcrumb-item"><a href="{{ route('admin.brand.index') }}">Quản Lý Thương Hiệu</a></li>
          <li class="breadcrumb-item active">Chỉnh Sửa Thương Hiệu</li>
        </ol>
      </div>
    </div>
  </div>
</section>

<section class="content">
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Chỉnh Sửa Thương Hiệu</h3>
    </div>
    <div class="card-body">
      <form action="{{ route('admin.brand.update', $brand->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label class="font-weight-bold">Hình thương hiệu:</label>
              <div class="img-thumbnail mb-2 position-relative">
                <img src="{{ asset('images/brands/' . $brand->image) }}" class="img-fluid" alt="Không có ảnh">
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
              <label class="font-weight-bold">Tên thương hiệu:</label>
              <input type="text" name="name" class="form-control" value="{{ $brand->name }}">
            </div>
            <div class="mb-3">
              <label for="sort_order">Sắp xếp</label>
              <select name="sort_order" id="sort_order" class="form-control">
                  {{-- <option value="0">None</option> --}}
                    {{!!$htmlsortorder!!}}
              </select>
            </div>  
            <div class="form-group">
              <label class="font-weight-bold">Trạng thái:</label>
              <select name="status" class="form-control">
                <option value="1" {{ $brand->status == 1 ? 'selected' : '' }}>Xuất bản</option>
                <option value="2" {{ $brand->status == 2 ? 'selected' : '' }}>Chưa xuất bản</option>
              </select>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label class="font-weight-bold">Mô tả:</label>
              <textarea name="description" class="form-control">{{ $brand->description }}</textarea>
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
        <div class="card-footer d-flex justify-content-end">
          <button type="submit" class="btn btn-success mr-2">Cập nhật</button>
          <a href="{{ route('admin.brand.index') }}" class="btn btn-secondary">Quay lại</a>
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
