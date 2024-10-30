<!-- resources/views/frontend/addresses/edit.blade.php -->

@extends('layouts.site')
@section('title', 'Sửa địa chỉ')

@section('content')
<div class="container">
    <h1>Sửa địa chỉ</h1>
    <form action="{{ route('addresses.update', $address->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="province">Tỉnh/Thành phố</label>
            <input type="text" id="province" name="province" class="form-control" value="{{ $address->province }}" required>
        </div>
        <div class="form-group">
            <label for="district">Quận/Huyện</label>
            <input type="text" id="district" name="district" class="form-control" value="{{ $address->district }}" required>
        </div>
        <div class="form-group">
            <label for="ward">Phường/Xã</label>
            <input type="text" id="ward" name="ward" class="form-control" value="{{ $address->ward }}" required>
        </div>
        <div class="form-group">
            <label for="street">Tên đường/Ấp</label>
            <input type="text" id="street" name="street" class="form-control" value="{{ $address->street }}" required>
        </div>
        <div class="form-group">
            <label for="specific">Địa chỉ cụ thể</label>
            <input type="text" id="specific" name="specific" class="form-control" value="{{ $address->specific }}">
        </div>
        <div class="form-group">
            <label for="phone">Số điện thoại</label>
            <input type="text" id="phone" name="phone" class="form-control" value="{{ $address->phone }}">
        </div>
        <button type="submit" class="btn btn-primary">Cập nhật</button>
    </form>
</div>
@endsection
