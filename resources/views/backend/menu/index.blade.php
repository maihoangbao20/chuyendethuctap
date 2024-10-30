@extends('layouts.admin')
@section('title','Menu')

@section('content')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Menu</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ url('admin') }}">Home</a></li>
                    <li class="breadcrumb-item active">Menu</li>
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
                    <a class="btn btn-sm btn-success" data-toggle="modal" data-target="#addMenuModal">
                        <i class="fas fa-plus"></i> Thêm Menu
                    </a>
                    <a class="btn btn-sm btn-danger" href="{{route('admin.menu.trash')}}">
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
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th class="text-center" style="width: 30px;">#</th>
                                <th>Tên </th>
                                <th>Đường dẫn</th>
                                <th>Kiểu</th>
                                <th>Vị trí</th>
                                <th>Mục cha</th>
                                <th>Thứ tự sắp xếp</th>
                                <th class="text-center" style="width: 190px;">Chức năng</th>
                                <th class="text-center" style="width: 30px;">ID</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($list as $row)
                            @php
                                $args = ['id' => $row->id];
                            @endphp
                            <tr>
                                <td class="text-center">
                                    <input type="checkbox" name="checkId[]" id="checkId" value="1">
                                </td>
                                <td>{{ $row->name }}</td>
                                <td>{{ $row->link }}</td>
                                <td>{{ $row->type }}</td>
                                <td>{{ $row->position }}</td>
                                <td>{{$row->parent_name }}</td>
                                <td>{{$row->sortorder_name}}</td>
                                <td class="text-center">
                                @if($row->status == 1)
                                    <a href="{{ route('admin.menu.status', $args) }}" class="btn btn-sm btn-success">
                                        <i class="fas fa-toggle-on"></i>
                                    </a>
                                @else
                                    <a href="{{ route('admin.menu.status', $args) }}" class="btn btn-sm btn-danger">
                                        <i class="fas fa-toggle-off"></i>
                                    </a>
                                @endif
                                    <a href="{{ route('admin.menu.show', $args) }}" class="btn btn-sm btn-info">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('admin.menu.edit', $args) }}" class="btn btn-sm btn-primary">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="{{ route('admin.menu.delete', $args) }}" class="btn btn-sm btn-danger" 
                                    onclick="return confirm('Bạn chắc chắn muốn đưa mục này vào thùng rác?')">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                                <td class="text-center">{{ $row->id }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
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
<div class="modal fade" id="addMenuModal" tabindex="-1" role="dialog" aria-labelledby="addMenuLabel" 
aria-hidden="true" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addMenuLabel">Thêm Menu</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        @include('backend.menu.create')
      </div>
      {{-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
        <button type="submit" class="btn btn-primary">Lưu</button>
      </div> --}}
    </div>
  </div>
</div>
@endsection
