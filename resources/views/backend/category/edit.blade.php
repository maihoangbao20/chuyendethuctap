  @extends('layouts.admin')
  @section('title', 'Chỉnh Sửa Danh Mục')

  @section('content')
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Chỉnh Sửa Danh Mục</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ url('admin') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.category.index') }}">Quản Lý Danh Mục</a></li>
            <li class="breadcrumb-item active">Chỉnh Sửa Danh Mục</li>
          </ol>
        </div>
      </div>
    </div>
  </section>

  <section class="content">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Chỉnh Sửa Danh Mục</h3>
      </div>
      <div class="card-body">
        <form action="{{ route('admin.category.update', $category->id) }}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label class="font-weight-bold">Hình danh mục:</label>
                <div class="img-thumbnail mb-2 position-relative">
                  <img src="{{ asset('images/categorys/' . $category->image) }}" class="img-fluid" alt="Không có ảnh">
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
                <label class="font-weight-bold">Tên danh mục:</label>
                <input type="text" name="name" class="form-control" value="{{ $category->name }}" required>
              </div>
              <div class="form-group">
                <label class="font-weight-bold">Danh mục cha:</label>
                <select name="parent_id" id="parent_id" class="form-control">
                  <option value="0">Không có</option>
                  @foreach ($list as $cat)
                    <option value="{{ $cat->id }}" {{ $cat->id == $category->parent_id ? 'selected' : '' }}>{{ $cat->name }}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <label class="font-weight-bold">Mô tả:</label>
                <textarea name="description" class="form-control" rows="5">{{ $category->description }}</textarea>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label class="font-weight-bold">Sắp xếp:</label>
                <select name="sort_order"  class="form-control">
                  {!! $htmlsortorder !!}
                </select>
              </div>
              <div class="form-group">
                <label class="font-weight-bold">Trạng thái:</label>
                <select name="status" class="form-control">
                  <option value="1" {{ $category->status == 1 ? 'selected' : '' }}>Xuất bản</option>
                  <option value="2" {{ $category->status == 2 ? 'selected' : '' }}>Chưa xuất bản</option>
                </select>
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
          <div class="card-footer d-flex justify-content-end">
            <a href="{{ route('admin.category.index') }}" class="btn btn-secondary mr-2">Quay lại</a>
            <button type="submit" class="btn btn-success">Lưu</button>
          </div>
        </form>
        <form id="delete-image-form" action="{{ route('admin.category.edit', $category->id) }}" method="GET" style="display: none;">
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
