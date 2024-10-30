@extends('layouts.admin')
@section('title','Chỉnh Sửa Chủ Đề')

@section('content')

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Chỉnh Sửa Chủ Đề</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ url('admin') }}">Home</a></li>
          <li class="breadcrumb-item"><a href="{{ route('admin.topic.index') }}">Quản Lý Chủ Đề</a></li>
          <li class="breadcrumb-item active">Chỉnh Sửa Chủ Đề</li>
        </ol>
      </div>
    </div>
  </div>
</section>

<section class="content">
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Chỉnh Sửa Chủ Đề</h3>
    </div>
    <div class="card-body">
      <form action="{{ route('admin.topic.update', $topic->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label class="font-weight-bold">Tên chủ đề:</label>
              <input type="text" name="name" class="form-control" value="{{ $topic->name }}">
            </div>
            <div class="form-group">
              <label class="font-weight-bold">Mô tả:</label>
              <textarea name="description" class="form-control">{{ $topic->description }}</textarea>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label class="font-weight-bold">Trạng thái:</label>
              <select name="status" class="form-control">
                <option value="1" {{ $topic->status == 1 ? 'selected' : '' }}>Xuất bản</option>
                <option value="2" {{ $topic->status == 2 ? 'selected' : '' }}>Chưa xuất bản</option>
              </select>
            </div>
            <div class="form-group">
              <label class="font-weight-bold">Thứ tự sắp xếp:</label>
              <select name="sort_order" class="form-control">
                {{-- <option value="0">None</option> --}}
                {!! $htmlsortorder !!}
              </select>
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
        <div class="card-footer d-flex justify-content-end">
          <button type="submit" class="btn btn-success mr-2">Cập nhật</button>
          <a href="{{ route('admin.topic.index') }}" class="btn btn-secondary">Quay lại</a>
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
