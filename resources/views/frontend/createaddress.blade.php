<!-- resources/views/frontend/addresses/create.blade.php -->

@extends('layouts.site')
@section('title', 'Thêm địa chỉ')

@section('content')
<div class="container">
    <h1>Thêm địa chỉ mới</h1>
    <form action="{{ route('addresses.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="province">Tỉnh/Thành phố</label>
            <input type="text" id="province" name="province" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="district">Quận/Huyện</label>
            <input type="text" id="district" name="district" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="ward">Phường/Xã</label>
            <input type="text" id="ward" name="ward" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="street">Tên đường/Ấp</label>
            <input type="text" id="street" name="street" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="specific">Địa chỉ cụ thể</label>
            <input type="text" id="specific" name="specific" class="form-control">
        </div>
        <div class="form-group">
            <label for="phone">Số điện thoại</label>
            <input type="text" id="phone" name="phone" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Lưu</button>
    </form>
</div>
@endsection
