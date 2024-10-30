@extends('layouts.admin')
@section('title', 'Chi Tiết Chủ Đề')

@section('content')

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Chi Tiết Chủ Đề</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ url('admin') }}">Home</a></li>
          <li class="breadcrumb-item"><a href="{{ route('admin.topic.index') }}">Quản Lý Chủ Đề</a></li>
          <li class="breadcrumb-item active">Chi Tiết Chủ Đề</li>
        </ol>
      </div>
    </div>
  </div>
</section>

<section class="content">
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Chi Tiết Chủ Đề</h3>
    </div>
    <div class="card-body">
      <div class="row">
        <div class="col-md-4">
          <div class="form-group">
            <label class="font-weight-bold">Tên chủ đề:</label>
            <p>{{ $topic->name }}</p>
          </div>
          <div class="form-group">
            <label class="font-weight-bold">Slug:</label>
            <p>{{ $topic->slug }}</p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label class="font-weight-bold">Trạng thái:</label>
            <p>{{ $topic->status == 1 ? 'Xuất bản' : 'Chưa xuất bản' }}</p>
          </div>
          <div class="form-group">
            <label class="font-weight-bold">Mô tả:</label>
            <p>{{ $topic->description }}</p>
          </div>
          <div class="form-group">
            <label class="font-weight-bold">Thứ tự sắp xếp:</label>
            <p>Sau:{{$sortedAfterTopicName}}</p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label class="font-weight-bold">Ngày tạo:</label>
            <p>{{ $topic->created_at }}</p>
          </div>
          <div class="form-group">
            <label class="font-weight-bold">Ngày cập nhật:</label>
            <p>{{ $topic->updated_at }}</p>
          </div>
        </div>
      </div>
    </div>
    <div class="card-footer d-flex justify-content-end">
      <a href="{{ route('admin.topic.index') }}" class="btn btn-primary mr-2">Quay lại</a>
      <a href="{{ route('admin.topic.edit', $topic->id) }}" class="btn btn-warning mr-2">Sửa</a>
      <a href="{{ route('admin.topic.delete', $topic->id) }}" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa chủ đề này?')">Xóa</a>
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
