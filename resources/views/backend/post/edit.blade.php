@extends('layouts.admin')
@section('title', 'Chỉnh Sửa Bài Viết')

@section('content')

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Chỉnh Sửa Bài Viết</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ url('admin') }}">Home</a></li>
          <li class="breadcrumb-item"><a href="{{ route('admin.post.index') }}">Quản Lý Bài Viết</a></li>
          <li class="breadcrumb-item active">Chỉnh Sửa Bài Viết</li>
        </ol>
      </div>
    </div>
  </div>
</section>

<section class="content">
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Chỉnh Sửa Bài Viết</h3>
    </div>
    <div class="card-body">
      <form action="{{ route('admin.post.update', $post->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label class="font-weight-bold">Tiêu Đề:</label>
              <input type="text" name="title" class="form-control" value="{{ $post->title }}" required>
            </div>
            <div class="form-group">
              <label class="font-weight-bold">Chủ đề:</label>
              <select name="topic_id" class="form-control">
                @foreach($topics as $topic)
                    <option value="{{ $topic->id }}" {{ $topic->id == $post->topic_id ? 'selected' : '' }}>{{ $topic->name }}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label class="font-weight-bold">Mô tả:</label>
              <textarea name="description" class="form-control" rows="5">{{ $post->description }}</textarea>
            </div>
            <div class="form-group">
              <label class="font-weight-bold">Chi tiết:</label>
              <textarea name="detail" class="form-control" rows="5">{{ $post->detail }}</textarea>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label class="font-weight-bold">Kiểu</label>
              <input type="text" name="type" class="form-control" value="{{ $post->type }}" required>
            </div>
            <div class="form-group">
              <label class="font-weight-bold">Hình danh mục:</label>
              <div class="img-thumbnail mb-2 position-relative">
                <img src="{{ asset('images/posts/' . $post->image) }}" class="img-fluid" alt="Không có ảnh">
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
              <label class="font-weight-bold">Trạng thái:</label>
              <select name="status" class="form-control">
                <option value="1" {{ $post->status == 1 ? 'selected' : '' }}>Xuất bản</option>
                <option value="2" {{ $post->status == 2 ? 'selected' : '' }}>Chưa xuất bản</option>
              </select>
            </div>
            <div class="form-group">
              <label class="font-weight-bold">Ngày tạo:</label>
              <p>{{ $post->created_at }}</p>
            </div>
            <div class="form-group">
              <label class="font-weight-bold">Ngày cập nhật:</label>
              <p>{{ $post->updated_at }}</p>
            </div>
          </div>
        </div>
        <div class="card-footer d-flex justify-content-end">
          <button type="submit" class="btn btn-primary">Lưu</button>
          <a href="{{ route('admin.post.index') }}" class="btn btn-danger ml-2">Hủy</a>
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
