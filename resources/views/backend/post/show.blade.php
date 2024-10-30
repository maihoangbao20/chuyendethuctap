@extends('layouts.admin')
@section('title', 'Chi Tiết Bài Viết')

@section('content')

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Chi Tiết Bài Viết</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ url('admin') }}">Home</a></li>
          <li class="breadcrumb-item"><a href="{{ route('admin.post.index') }}">Quản Lý Bài Viết</a></li>
          <li class="breadcrumb-item active">Chi Tiết Bài Viết</li>
        </ol>
      </div>
    </div>
  </div>
</section>

<section class="content">
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Chi Tiết Bài Viết</h3>
    </div>
    <div class="card-body">
      <div class="row">
        <div class="col-md-4">
          <div class="form-group">
            <label class="font-weight-bold">Tiêu Đề:</label>
            <p>{{ $post->title }}</p>
          </div>
          <div class="form-group">
            <label class="font-weight-bold">Chủ đề:</label>
            <p>{{ $topicName }}</p>
          </div>
          <div class="form-group">
            <label class="font-weight-bold">Chi tiết:</label>
            <p>{{ $post->detail }}</p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label class="font-weight-bold">Kiểu:</label>
            <p>{{ $post->type }}</p>
          </div>
          <div class="form-group">
            <label class="font-weight-bold">Trạng thái:</label>
            <p>{{ $post->status == 1 ? 'Xuất bản' : 'Chưa xuất bản' }}</p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label class="font-weight-bold">Hình ảnh:</label>
            <img src="{{ asset("images/posts/".$post->image) }}" class="img-fluid" alt="{{ $post->image }}">
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
    </div>
    <div class="card-footer d-flex justify-content-end">
      <a href="{{ route('admin.post.index') }}" class="btn btn-primary mr-2">Quay lại</a>
      <a href="{{ route('admin.post.edit', $post->id) }}" class="btn btn-warning mr-2">Sửa</a>
      <a href="{{ route('admin.post.delete', $post->id) }}" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa bài viết này?')">Xóa</a>
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
