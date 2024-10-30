@extends('layouts.admin')
@section('title', 'Cảnh Báo')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Cảnh Báo Quản Trị</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ url('admin') }}">Trang Chủ</a></li>
                    <li class="breadcrumb-item active">Thông Tin Quản Trị</li>
                </ol>
            </div>
        </div>
    </div>
</section>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Cảnh Báo <i class="fas fa-exclamation-triangle mr-2"></i> </div>

                    <div class="card-body">
                        <div class="alert alert-warning" role="alert">
                            <h4 class="alert-heading">Cảnh Báo!</h4>
                            <p>Trang này là trang cảnh báo cho phần quản trị hệ thống.</p>
                            <hr>
                            <p class="mb-0">Hãy cẩn thận khi thực hiện các thao tác quản trị.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
