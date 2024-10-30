@extends('layouts.admin')
@section('title', 'QL Sản Phẩm')
@section('content')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Quản Lý Sản Phẩm</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ url('admin') }}">Home</a></li>
                    <li class="breadcrumb-item active">Blank Page</li>
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
                <div class="col-12 text-right">
                    <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#addProductModal">
                        <i class="fas fa-plus"></i> ThêmSP
                    </button>
                     <a class="btn btn-sm btn-danger" href="{{route('admin.product.trash')}}">
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
            <table class="table table-bordered table-hover table-striped">
                <thead>
                    <tr>
                        <th class="text-center" style="width: 30px;">#</th>
                        <th class="text-center" style="width: 90px;">Hình</th>
                        <th>Tên sản phẩm</th>
                        {{-- <th style="width: 90px;">Slug</th> --}}
                        <th>Danh mục</th>
                        <th>Thương hiệu</th>
                        <th>Giá</th>
                        <th>Giá sale</th>
                        <th class="text-center" style="width: 170px;">Chức năng</th>
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
                        <td class="text-center">
                            <img src="{{ asset('images/products/'.$row->image) }}" class="img-fluid" alt="{{ $row->image }}">
                        </td>
                        <td>{{ $row->name }}</td>
                        {{-- <td>{{ $row->slug }}</td> --}}
                        <td>{{ $row->categoryname }}</td>
                        <td>{{ $row->brandname }}</td>
                        <td>{{$row->price}}.đ</td>
                        <td>{{$row->pricesale}}.đ</td>
                        <td class="text-center">
                        @if($row->status==1)
                            <a href="{{ route('admin.product.status',$args) }}" class="btn btn-sm btn-success">
                                <i class="fas fa-toggle-on"></i>
                            </a>
                        @else
                            <a href="{{ route('admin.product.status',$args) }}" class="btn btn-sm btn-danger">
                                <i class="fas fa-toggle-off"></i>
                            </a>
                        @endif
                            <a href="{{ route('admin.product.show',$args) }}" class="btn btn-sm btn-info">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="{{ route('admin.product.edit',$args) }}" class="btn btn-sm btn-primary">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="{{ route('admin.product.delete',$args) }}" class="btn btn-sm btn-danger">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                        <td class="text-center">{{ $row->id }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
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
<!-- Add Product Modal -->
<div class="modal fade" id="addProductModal" tabindex="-1" role="dialog" aria-labelledby="addProductLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addProductLabel">Thêm Sản Phẩm</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        @include('backend.product.create')
      </div>
      {{-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
        <button type="submit" class="btn btn-primary">Lưu</button>
      </div> --}}
    </div>
  </div>
</div>
@endsection
@push('scripts')
<script>
    $(document).ready(function () {
        $('#addProductModal').on('hidden.bs.modal', function () {
            $(this).find('form').trigger('reset');
        });
    });
</script>
@endpush