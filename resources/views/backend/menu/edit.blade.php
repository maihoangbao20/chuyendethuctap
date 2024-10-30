@extends('layouts.admin')
@section('title', 'Chỉnh Sửa Menu')

@section('content')

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Chỉnh Sửa Menu</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ url('admin') }}">Home</a></li>
          <li class="breadcrumb-item"><a href="{{ route('admin.menu.index') }}">Quản Lý Menu</a></li>
          <li class="breadcrumb-item active">Chỉnh Sửa Menu</li>
        </ol>
      </div>
    </div>
  </div>
</section>

<section class="content">
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Chỉnh Sửa Menu</h3>
    </div>
    <form action="{{ route('admin.menu.update', $menu->id) }}" method="POST">
      @csrf
      @method('PUT')
      <div class="card-body">
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label class="font-weight-bold">Tên Menu:</label>
              <input type="text" name="name" class="form-control" value="{{ $menu->name }}" required>
            </div>
            <div class="form-group">
              <label class="font-weight-bold">Link:</label>
              <input type="text" name="link" class="form-control" value="{{ $menu->link }}" required>
            </div>
            <div class="form-group">
              <label class="font-weight-bold">Vị trí:</label>
              <input type="text" name="position" class="form-control" value="{{ $menu->position }}" required>
            </div>
            <div class="form-group">
              <label class="font-weight-bold">Loại:</label>
              <input type="text" name="type" class="form-control" value="{{ $menu->type }}" required>
            </div>
            <div class="form-group">
              <label class="font-weight-bold">Trạng thái:</label>
              <select name="status" class="form-control">
                <option value="1" {{ $menu->status == 1 ? 'selected' : '' }}>Xuất bản</option>
                <option value="2" {{ $menu->status == 2 ? 'selected' : '' }}>Chưa xuất bản</option>
              </select>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label class="font-weight-bold">Danh mục cha:</label>
              <select name="parent_id" class="form-control">
                <option value="">Không có</option>
                @foreach ($list as $row)
                  <option value="{{ $row->id }}" {{ $menu->parent_id == $row->id ? 'selected' : '' }}>{{ $row->name }}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label class="font-weight-bold">Sắp xếp:</label>
              <input type="number" name="sort_order" class="form-control" value="{{ $menu->sort_order }}" required>
            </div>
            <div class="form-group">
              <label class="font-weight-bold">Mô tả:</label>
              <textarea name="description" class="form-control" rows="5">{{ $menu->description }}</textarea>
            </div>
          </div>
        </div>
      </div>
      <div class="card-footer d-flex justify-content-end">
        <button type="submit" class="btn btn-success">Lưu</button>
        <a href="{{ route('admin.menu.index') }}" class="btn btn-primary ml-2">Quay lại</a>
      </div>
    </form>
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
