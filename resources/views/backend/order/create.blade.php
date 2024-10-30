<div class="card">
    <div class="card-header">
        <h4>Thêm Đơn Hàng</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.order.store') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="delivery_name">Tên người nhận</label>
                <input type="text" value="{{ old('delivery_name') }}" name="delivery_name" id="delivery_name" class="form-control" placeholder="Nhập tên người nhận...">
                @error('delivery_name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="delivery_phone">Số điện thoại</label>
                <input type="text" value="{{ old('delivery_phone') }}" name="delivery_phone" id="delivery_phone" class="form-control" placeholder="Nhập số điện thoại...">
                @error('delivery_phone')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="delivery_email">Email</label>
                <input type="email" value="{{ old('delivery_email') }}" name="delivery_email" id="delivery_email" class="form-control" placeholder="Nhập email...">
                @error('delivery_email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="delivery_address">Địa chỉ</label>
                <input type="text" value="{{ old('delivery_address') }}" name="delivery_address" id="delivery_address" class="form-control" placeholder="Nhập địa chỉ...">
                @error('delivery_address')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="note">Ghi chú</label>
                <textarea name="note" id="note" class="form-control" placeholder="Nhập ghi chú...">{{ old('note') }}</textarea>
            </div>
            <div class="mb-3 d-flex justify-content-end">
                <button type="submit" class="btn btn-success">Thêm Đơn Hàng</button>
            </div>
        </form>
    </div>
</div>
