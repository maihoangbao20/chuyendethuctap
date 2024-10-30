@extends('layouts.admin')
@section('title', 'Chi Tiết Menu')

@section('content')

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Chi Tiết Menu</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ url('admin') }}">Home</a></li>
          <li class="breadcrumb-item"><a href="{{ route('admin.menu.index') }}">Quản Lý Menu</a></li>
          <li class="breadcrumb-item active">Chi Tiết Menu</li>
        </ol>
      </div>
    </div>
  </div>
</section>

<section class="content">
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Chi Tiết Menu</h3>
    </div>
    <div class="card-body">
      <div class="row">
        <div class="col-md-4">
          <div class="form-group">
            <label class="font-weight-bold">Tên Menu:</label>
            <p>{{ $menu->name }}</p>
          </div>
          <div class="form-group">
            <label class="font-weight-bold">Link:</label>
            <p>{{ $menu->link }}</p>
          </div>
          <div class="form-group">
            <label class="font-weight-bold">Vị trí:</label>
            <p>{{ $menu->position }}</p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label class="font-weight-bold">Loại:</label>
            <p>{{ $menu->type }}</p>
          </div>
          <div class="form-group">
            <label class="font-weight-bold">Danh mục cha:</label>
            <p>{{ $parentName }}</p>
          </div>
          <div class="form-group">
            <label class="font-weight-bold">Sắp xếp:</label>
            <p>{{ $sortOrder }}</p>
          </div>
        </div>
        <div class="col-md-4 ">
          <div class="form-group">
            <label class="font-weight-bold">Trạng thái:</label>
            <p>{{ $menu->status == 1 ? 'Xuất bản' : 'Chưa xuất bản' }}</p>
          </div>
          <div class="form-group">
            <label class="font-weight-bold">Ngày tạo:</label>
            <p>{{ $menu->created_at }}</p>
          </div>
          <div class="form-group">
            <label class="font-weight-bold">Ngày cập nhật:</label>
            <p>{{ $menu->updated_at }}</p>
          </div>
        </div>
      </div>
    </div>
    <div class="card-footer d-flex justify-content-end">
      <a href="{{ route('admin.menu.index') }}" class="btn btn-primary mr-2">Quay lại</a>
      <a href="{{ route('admin.menu.edit', $menu->id) }}" class="btn btn-warning mr-2">Sửa</a>
      <a href="{{ route('admin.menu.delete', $menu->id) }}" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa menu này?')">Xóa</a>
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
