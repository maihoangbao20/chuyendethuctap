@extends('layouts.admin')
@section('title','QL Chủ Đề')

@section('content')

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Quản Lý Chủ Đề</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ url('admin') }}">Home</a></li>
          <li class="breadcrumb-item active">Quản Lý Chủ Đề</li>
        </ol>
      </div>
    </div>
  </div>
</section>

<section class="content">
  <div class="card">
    <div class="card-header">
      <div class="row">
        <div class="col-12 text-right">
          <a class="btn btn-sm btn-danger" href="{{route('admin.topic.trash')}}">
            <i class="fas fa-trash"></i> Thùng rác
          </a>
        </div>
      </div>
    </div>
    <div class="card-body">
      @if (session('success'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
              {{ session('success') }}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
      @endif
      <div class="row">
        <div class="col-md-3">
          <!-- FORM thêm -->
          <div class="card">
            <div class="card-header">
              <h4><label>Thêm Chủ Đề</label></h4>
            </div>
            <div class="card-body">
              <form method="POST" enctype="multipart/form-data" action="{{ route('admin.topic.store') }}">
                @csrf
                <div class="form-group">
                  <label for="name">Tên chủ đề</label>
                  <input type="text" value="{{old('name')}}" name="name" id="name" class="form-control small-placeholder" placeholder="Nhập tên chủ đề..." required>
                @error('name')
                <span class="text-danger">{{$message}}</span>
                @enderror
                </div>
                <div class="form-group">
                  <label for="description">Mô tả</label>
                  <textarea name="description" id="description" class="form-control small-placeholder" placeholder="Nhập mô tả..." required>{{old('description')}}</textarea>
                </div>
                <div class="mb-3">
                  <label for="sort_order">Sắp xếp</label>
                    <select name="sort_order" id="sort_order" class="form-control">
                      <option value="0">None</option>
                        {!!$htmlsortorder!!}
                    </select>
                </div>
                <div class="mb-3">
                   <label for="status">Trạng thái</label>
                    <select name="status" id="status" class="form-control">
                      <option value="2">Chưa xuất bản</option>
                      <option value="1">Xuất bản</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-success">Thêm chủ đề</button>
              </form>
            </div>
          </div>
        </div>
        <div class="col-md-9">
          <table class="table table-bordered table-hover table-striped">
            <thead>
              <tr>
                <th class="text-center" style="width: 30px;">#</th>
                <th>Chủ đề</th>
                <th>Slug</th>
                <th>Mô tả</th>
                <th class="text-center" style="width: 190px;">Chức năng</th>
                <th class="text-center" style="width: 30px;">ID</th>
              </tr>
            </thead>
            <tbody>
              @foreach($list as $row)
              <tr>
              @php
                $args=['id'=>$row->id];
              @endphp
                <td class="text-center">
                  <input type="checkbox" name="checkId[]" id="checkId" value="1">
                </td>
                <td>{{$row->name}}</td>
                <td>{{$row->slug}}</td>
                <td>{{$row->description}}</td>
                <td class="text-center">
                @if($row->status==1)
                  <a href="{{route('admin.topic.status',$args)}}" class="btn btn-sm btn-success">
                    <i class="fas fa-toggle-on"></i>
                  </a>
                @else
                  <a href="{{route('admin.topic.status',$args)}}" class="btn btn-sm btn-danger">
                    <i class="fas fa-toggle-off"></i>
                  </a>
                @endif
                  <a href="{{route('admin.topic.show',$args)}}" class="btn btn-sm btn-info">
                    <i class="fas fa-eye"></i>
                  </a>
                  <a href="{{route('admin.topic.edit',$args)}}" class="btn btn-sm btn-primary">
                    <i class="fas fa-edit"></i>
                  </a>
                  <a href="{{route('admin.topic.delete',$args)}}" class="btn btn-sm btn-danger">
                    <i class="fas fa-trash"></i>
                  </a>
                </td>
                <td class="text-center">{{$row->id}}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
<div class="card-footer clearfix">
    <div class="float-left">
        <nav aria-label="Page navigation">
            <ul class="pagination">
                @if ($list->onFirstPage())
                    <li class="page-item disabled">
                        <span class="page-link" aria-label="Trang trước">
                            <span aria-hidden="true">&laquo;</span>
                            <span class="sr-only">Trang trước</span>
                        </span>
                    </li>
                @else
                    <li class="page-item">
                        <a class="page-link" href="{{ $list->previousPageUrl() }}" aria-label="Trang trước">
                            <span aria-hidden="true">&laquo;</span>
                            <span class="sr-only">Trang trước</span>
                        </a>
                    </li>
                @endif
                
                @foreach (range(1, $list->lastPage()) as $page)
                    <li class="page-item {{ $page == $list->currentPage() ? 'active' : '' }}">
                        <a class="page-link" href="{{ $list->url($page) }}">{{ $page }}</a>
                    </li>
                @endforeach
                
                @if ($list->hasMorePages())
                    <li class="page-item">
                        <a class="page-link" href="{{ $list->nextPageUrl() }}" aria-label="Trang tiếp theo">
                            <span aria-hidden="true">&raquo;</span>
                            <span class="sr-only">Trang tiếp theo</span>
                        </a>
                    </li>
                @else
                    <li class="page-item disabled">
                        <span class="page-link" aria-label="Trang tiếp theo">
                            <span aria-hidden="true">&raquo;</span>
                            <span class="sr-only">Trang tiếp theo</span>
                        </span>
                    </li>
                @endif
            </ul>
        </nav>
    </div>
</div>

</section>

@endsection
