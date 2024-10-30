@extends('layouts.admin')
@section('title','Chi Tiết Banner')

@section('content')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Chi Tiết Banner</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ url('admin') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.banner.index') }}">Banner</a></li>
                    <li class="breadcrumb-item active">Chi Tiết Banner</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Chi Tiết Banner</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="image">Hình ảnh:</label>
                        <p><img src="{{ asset('images/banners/'.$banner->image) }}" class="img-fluid" alt="{{ $banner->image }}"></p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="name">Tên banner:</label>
                        <p>{{ $banner->name }}</p>
                    </div>
                    <div class="form-group">
                        <label for="link">Đường dẫn:</label>
                        <p>{{ $banner->link }}</p>
                    </div>
                    <div class="form-group">
                        <label for="position">Vị trí:</label>
                        <p>{{ $banner->position }}</p>
                    </div>
                    <div class="form-group">
                        <label for="status">Trạng thái:</label>
                        <p>{{ $banner->status == 1 ? 'Xuất bản' : 'Chưa xuất bản' }}</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="description">Mô tả:</label>
                        <p>{{ $banner->description }}</p>
                    </div>
                    <div class="form-group">
                        <label for="created_at">Ngày tạo:</label>
                        <p>{{ $banner->updated_at }}</p>
                    </div>
                    <div class="form-group">
                        <label for="updated_at">Ngày cập nhật:</label>
                        <p>{{ $banner->updated_at }}</p>
                    </div>
                </div>
            </div>
        </div>
    <div class="card-footer d-flex justify-content-end">
      <a href="{{ route('admin.banner.index') }}" class="btn btn-primary mr-2">Quay lại</a>
      <a href="{{ route('admin.banner.edit', $banner->id) }}" class="btn btn-warning mr-2">Sửa</a>
      <a href="{{ route('admin.banner.delete', $banner->id) }}" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa danh mục này?')">Xóa</a>
    </div>
    </div>
</section>

@endsection
