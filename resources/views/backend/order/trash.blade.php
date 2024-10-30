@extends('layouts.admin')
@section('title', 'Thùng Rác Đơn Hàng')

@section('content')

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Thùng Rác Đơn Hàng</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ url('admin') }}">Home</a></li>
          <li class="breadcrumb-item active">Thùng Rác Đơn Hàng</li>
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
          <a href="{{ route('admin.order.index') }}" class="btn btn-primary mr-2">Quay lại</a>
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
            <th>Tên KH</th>
            <th>Số điện thoại</th>
            <th>Email</th>
            <th>Địa chỉ</th>
            <th>Ngày tạo đơn</th>
            <th class="text-center" style="width: 190px;">Chức năng</th>
            <th class="text-center" style="width: 30px;">ID</th>
          </tr>
        </thead>
        <tbody>
          @foreach($list as $row)
          <tr>
            <td class="text-center">
              <input type="checkbox" name="checkId[]" id="checkId" value="{{ $row->id }}">
            </td>
            <td>{{ $row->delivery_name }}</td>
            <td>{{ $row->delivery_phone }}</td>
            <td>{{ $row->delivery_email }}</td>
            <td>{{ $row->delivery_address }}</td>
            <td>{{ $row->created_at }}</td>
            <td class="text-center">
              <!-- Restore Button -->
              <a href="{{ route('admin.order.restore', ['id' => $row->id]) }}" class="btn btn-sm btn-success" onclick="return confirm('Bạn chắc chắn muốn khôi phục đơn hàng này?')">
                  <i class="fas fa-undo"></i> Khôi phục
              </a>
              <!-- Destroy Button -->
              <form action="{{ route('admin.order.destroy', ['id' => $row->id]) }}" method="POST" style="display: inline;">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Bạn chắc chắn muốn xóa vĩnh viễn đơn hàng này?')">
                      <i class="fas fa-trash"></i> Xóa
                  </button>
              </form>
            </td>
            <td class="text-center">{{ $row->id }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</section>

@endsection
