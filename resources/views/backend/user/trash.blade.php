@extends('layouts.admin')
@section('title','QL Thành Viên')

@section('content')

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Thùng Rác Thành Viên</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ url('admin') }}">Home</a></li>
          <li class="breadcrumb-item active">Thùng rác Thành Viên</li>
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
          <a href="{{ route('admin.user.index') }}" class="btn btn-primary mr-2">Quay lại</a>
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
                <th>Tên thành viên</th>
                <th>Username</th>
                <th>Số điện thoại</th>
                <th>Email</th>
                <th>Địa chỉ</th>
                <th>Vai trò</th>
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
                <td>{{$row->username}}</td>
                <td>{{$row->phone}}</td>
                <td>{{$row->email}}</td>
                <td>{{$row->address}}</td>
                <td>{{$row->roles}}</td>
                <td class="text-center">
                  <a onclick="return confirm('Bạn chắc chắn muốn khôi mục?')" href="{{ route('admin.user.restore', ['id' => $row->id]) }}" class="btn btn-sm btn-success">
                      <i class="fas fa-undo"></i> Restore
                  </a>
                  <form action="{{ route('admin.user.destroy', ['id' => $row->id]) }}" method="POST" style="display: inline;">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Bạn chắc chắn muốn xóa vĩnh viễn?')">
                          <i class="fas fa-trash"></i> Destroy
                      </button>
                  </form>
                </td>
                <td class="text-center">{{$row->id}}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
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
