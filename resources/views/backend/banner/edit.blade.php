@extends('layouts.admin')
@section('title','Chỉnh Sửa Banner')

@section('content') 

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Chỉnh Sửa Banner</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ url('admin') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.banner.index') }}">Banner</a></li>
                    <li class="breadcrumb-item active">Chỉnh Sửa Banner</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.banner.update', ['id' => $banner->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                  <div class="col-md-4">
                        <div class="form-group">
                          <label class="font-weight-bold">Hình :</label>
                          <div class="img-thumbnail mb-2 position-relative">
                            <img src="{{ asset('images/banners/' . $banner->image) }}" class="img-fluid" alt="Không có ảnh">
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
                            <label for="name">Tên banner:</label>
                            <input type="text" value="{{ $banner->name }}" name="name" id="name" class="form-control" placeholder="Nhập tên banner..." required>
                        </div>
                        <div class="form-group">
                            <label for="position">Vị trí:</label>
                            <input type="text" value="{{ $banner->position }}" name="position" id="position" class="form-control" placeholder="Nhập vị trí...">
                        </div>
                        <div class="form-group">
                            <label for="status">Trạng thái:</label>
                            <select name="status" id="status" class="form-control">
                                <option value="1" {{ $banner->status == 1 ? 'selected' : '' }}>Xuất bản</option>
                                <option value="2" {{ $banner->status == 2 ? 'selected' : '' }}>Chưa xuất bản</option>
                            </select>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="font-weight-bold">Mô tả:</label>
                          <textarea name="description" class="form-control" rows="5">{{ $banner->description }}</textarea>
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
                  <div class="card-footer d-flex justify-content-end">
                    <a href="{{ route('admin.category.index') }}" class="btn btn-secondary mr-2">Quay lại</a>
                    <button type="submit" class="btn btn-success">Lưu</button>
                  </div>
            </form>
        </div>
    </div>
</section>

@endsection
