@extends('layouts.site')
@section('title', 'Thanh toán')
@section('content')

<body>
@include('frontend.header')

<div class="container">
    <h2>Thông tin thanh toán</h2>
<div class="row">
    <div class="col-md-8">
        <div>
            <h4>Địa chỉ giao hàng</h4>
            @if($addresses->isEmpty())
                <p>Chưa có địa chỉ giao hàng</p>
                <button data-toggle="modal" data-target="#addAddressModal">+ Thêm địa chỉ giao hàng</button>
            @else
                @foreach ($addresses as $address)
                    @if ($address->status == 1)
                        <div class="address-option address-border">
                            <input type="radio" name="selected_address" value="{{ $address->id }}"
                                @if ($address->is_default) checked @endif class="hidden-radio">
                            <label>
                                {{ $address->name }} - 
                                {{ $address->phone }} - 
                                {{ $address->specific }} - 
                                {{ $address->street }} - 
                                {{ $address->ward_name ?? 'N/A' }} - 
                                {{ $address->district_name ?? 'N/A' }} - 
                                {{ $address->province_name ?? 'N/A' }}
                            </label>
                            <button class="btn btn-edit" data-toggle="modal" data-target="#selectAddressModal">Thay đổi địa chỉ</button>
                        </div>
                    @endif
                @endforeach
            @endif
        </div>
        <div>
            <h4>Sản phẩm trong giỏ hàng</h4>
            <ul class="list-group mb-3">
                @forelse ($cart as $id => $details)
                    <li class="list-group-item d-flex align-items-center">
                        <div class="img">
                            <a href="{{ route('product_detail', ['id' => $details->product->id]) }}">
                                @if(optional($details->product->images)->isNotEmpty())
                                    <img src="{{ asset('img/products/' . $details->product->images->first()->filename) }}" alt="{{ $details->product->name }}" style="width: 50px; height: 50px; margin-right: 10px;">
                                @else
                                    <img src="{{ asset('img/default-image.jpg') }}" alt="Default Image" style="width: 50px; height: 50px; margin-right: 10px;">
                                @endif
                            </a>
                        </div>
                        <div class="product-info">
                            <p>{{ $details->product->name }}</p>
                            <p class="price-info">
                                <span class="original-price">{{ number_format($details->product->price, 0, ',', '.') }} đ</span> 
                                <span class="sale-price">{{ number_format($details['price'], 0, ',', '.') }} đ</span> 
                                <span class="quantity">SL: {{ $details['quantity'] }}</span> 
                                <span class="total">Tổng: {{ number_format($details['price'] * $details['quantity'], 0, ',', '.') }} đ</span>
                            </p>
                        </div>
                    </li>

                    <!-- Trường ẩn để gửi từng chi tiết sản phẩm -->
                    <input type="hidden" name="products[{{ $id }}][id]" value="{{ $details->product->id }}">
                    <input type="hidden" name="products[{{ $id }}][quantity]" value="{{ $details['quantity'] }}">
                    <input type="hidden" name="products[{{ $id }}][price]" value="{{ $details['price'] }}">
                @empty
                    <li class="list-group-item text-center">Không có sản phẩm trong giỏ hàng.</li>
                @endforelse
            </ul>
        </div>
    </div>
    <!-- Thông tin đơn hàng -->
    <div class="col-md-4">
        <h4>Thông tin đơn hàng</h4>
        <form action="{{ route('checkout.updateOrder') }}" method="POST">
            @csrf
            <!-- Trường ẩn để gửi ID địa chỉ đã chọn -->
            <input type="hidden" name="selected_address" value="{{ old('selected_address') }}">

            <!-- Phí vận chuyển và tổng giá trị -->
            <div class="form-group">
                <label for="shipping_fee">Phí ship:</label>
                <input type="text" id="shipping_fee" name="shipping_fee" class="form-control" value="{{ number_format($shippingFee, 0, ',', '.') }} đ" readonly>
            </div>
            <div class="form-group">
                <label for="total">Tổng giá trị giỏ hàng:</label>
                <input type="text" id="total" name="total" class="form-control" value="{{ number_format($cartTotal, 0, ',', '.') }} đ" readonly>
            </div>

            <h5>Tổng giá trị đơn hàng: {{ number_format($totalOrderValue, 0, ',', '.') }} đ</h5>

            <button type="submit" class="btn btn-primary">Đặt hàng</button>
        </form>
    </div>
</div>
</div>

<!-- Modal for selecting address -->
<!-- Modal chọn địa chỉ -->
<div class="modal fade" id="selectAddressModal" tabindex="-1" role="dialog" aria-labelledby="selectAddressModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="selectAddressModalLabel">Chọn địa chỉ giao hàng</h5>
                {{-- <div id="successMessage" class="alert alert-success" style="display: none;"></div> --}}
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Nút thêm địa chỉ -->
                <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#addAddressModal">+ Thêm địa chỉ giao hàng</button>
                
                <!-- Danh sách địa chỉ -->
                <div class="address-list">
                    <ul class="list-unstyled">
                        @forelse($addresses as $address)
                            @if ($address->status == 1 || $address->status == 2)
                                <li class="address-item row {{ $address->status == 1 ? 'selected-address' : '' }}">
                                    <div class="col-md-9 address-details">
                                        <!-- Radio button để chọn địa chỉ -->
                                        <input type="radio" name="address_id" value="{{ $address->id }}" id="address-{{ $address->id }}" {{ $address->status == 1 ? 'checked' : '' }}>
                                        <label for="address-{{ $address->id }}">
                                            {{ $address->name }} - 
                                            {{ $address->phone }} - 
                                            {{ $address->specific }} - 
                                            {{ $address->street }} - 
                                            {{ $address->ward_name ?? 'N/A' }} - 
                                            {{ $address->district_name ?? 'N/A' }} - 
                                            {{ $address->province_name ?? 'N/A' }}
                                        </label>
                                    </div>
                                    <div class="col-md-3 text-right">
                                        <!-- Nút chỉnh sửa địa chỉ -->
                                        <button type="button" class="btn btn-link btn-edit-address" data-address-id="{{ $address->id }}" data-toggle="modal" data-target="#editAddressModal">Chỉnh sửa</button>
                                    </div>
                                </li>
                            @endif
                        @empty
                            <li class="address-item">
                                <span>Chưa có địa chỉ nào.</span>
                            </li>
                        @endforelse
                    </ul>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                <!-- Nút cập nhật địa chỉ -->
                <button type="button" class="btn btn-primary" id="updateAddressButton" data-address-id="{{ $address->id }}">Cập nhật địa chỉ</button>
            </div>
        </div>
    </div>
</div>

@include('frontend.footer')

<!-- Add Address Modal -->
<!-- Add Address Modal -->
<div class="modal fade" id="addAddressModal" tabindex="-1" role="dialog" aria-labelledby="addAddressModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="{{ route('checkout.addAddress') }}" method="POST">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addAddressModalLabel">Thêm địa chỉ giao hàng</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Tên người nhận</label>
                        <input type="text" id="name" name="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Số điện thoại</label>
                        <input type="text" id="phone" name="phone" class="form-control" required>
                    </div>
                    {{-- <div class="form-group">
                        <label for="status">Trạng thái</label>
                        <select id="status" name="status" class="form-control" required>
                            <option value="0">Chưa xác định</option>
                            <option value="1">Hoạt động</option>
                            <option value="2" selected>Không hoạt động</option>
                        </select>
                    </div> --}}
                    <div class="form-group">
                        <label for="province">Tỉnh/Thành phố</label>
                        <select id="province" name="province_id" class="form-control">
                            <option value="">Chọn Tỉnh/Thành phố</option>
                            @foreach($provinces as $province)
                                <option value="{{ $province->id }}">{{ $province->name }}</option>
                            @endforeach
                            <option value="add_new_province">Nhập tỉnh/thành phố không tìm thấy</option>
                        </select>
                        <input type="text" id="newprovince" name="new_province" class="form-control" placeholder="Nhập tỉnh/thành phố mới" style="display:none;">
                    </div>
                    <div class="form-group">
                        <label for="district">Quận/Huyện</label>
                        <select id="district" name="district_id" class="form-control" disabled>
                            <option value="">Chọn Quận/Huyện</option>
                            <option value="add_new_district">Nhập quận/huyện không tìm thấy</option>
                        </select>
                        <input type="text" id="newdistrict" name="new_district" class="form-control" placeholder="Nhập quận/huyện mới" style="display:none;">
                    </div>
                    <div class="form-group">
                        <label for="ward">Phường/Xã</label>
                        <select id="ward" name="ward_id" class="form-control" disabled>
                            <option value="">Chọn Phường/Xã</option>
                            <option value="add_new_ward">Nhập phường/xã không tìm thấy</option>
                        </select>
                        <input type="text" id="newward" name="new_ward" class="form-control" placeholder="Nhập phường/xã mới" style="display:none;">
                    </div>
                    <div class="form-group">
                        <label for="street">Tên đường/Ấp</label>
                        <input type="text" id="street" name="street" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="specific">Cụ thể</label>
                        <input type="text" id="specific" name="specific" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                    <button type="submit" class="btn btn-primary">Lưu địa chỉ</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<script src="lib/easing/easing.min.js"></script>
<script src="lib/slick/slick.min.js"></script>
<script src="js/main.js"></script>

<script>
    $(document).ready(function() {
        function handleVisibility(field, condition) {
            $(field).toggle(condition);
        }

        function enableDistrictAndWardFields() {
            $('#district').prop('disabled', false);
            $('#ward').prop('disabled', false);

            $('#district').html('<option value="">Chọn Quận/Huyện</option><option value="add_new_district">Nhập quận/huyện không tìm thấy</option>');
            $('#ward').html('<option value="">Chọn Phường/Xã</option><option value="add_new_ward">Nhập phường/xã không tìm thấy</option>');
        }

        $('#province').change(function() {
            var provinceId = $(this).val();
            handleVisibility('#newprovince', provinceId === 'add_new_province');

            enableDistrictAndWardFields();

            if (provinceId !== '' && provinceId !== 'add_new_province') {
                $.ajax({
                    url: '{{ route('checkout.Districts') }}',
                    type: 'GET',
                    data: { province_id: provinceId },
                    success: function(data) {
                        $('#district').html('<option value="">Chọn Quận/Huyện</option><option value="add_new_district">Nhập quận/huyện không tìm thấy</option>');
                        $.each(data, function(key, district) {
                            $('#district').append('<option value="' + district.id + '">' + district.name + '</option>');
                        });
                    },
                    error: function(xhr) {
                        alert('Có lỗi xảy ra khi tải danh sách quận/huyện.');
                    }
                });
            }
        });

        $('#district').change(function() {
            var districtId = $(this).val();
            handleVisibility('#newdistrict', districtId === 'add_new_district');

            if (districtId !== '' && districtId !== 'add_new_district') {
                $.ajax({
                    url: '{{ route('checkout.Wards') }}',
                    type: 'GET',
                    data: { district_id: districtId },
                    success: function(data) {
                        $('#ward').html('<option value="">Chọn Phường/Xã</option><option value="add_new_ward">Nhập phường/xã không tìm thấy</option>');
                        $.each(data, function(key, ward) {
                            $('#ward').append('<option value="' + ward.id + '">' + ward.name + '</option>');
                        });
                    },
                    error: function(xhr) {
                        alert('Có lỗi xảy ra khi tải danh sách phường/xã.');
                    }
                });
            }
        });

        $('#ward').change(function() {
            var wardId = $(this).val();
            handleVisibility('#newward', wardId === 'add_new_ward');
        });

        // Khởi tạo các trường ngay từ đầu
        enableDistrictAndWardFields();

        // Xử lý sự kiện submit của form
        $('#addAddressForm').on('submit', function(e) {
            var provinceId = $('#province').val();
            var districtId = $('#district').val();
            var wardId = $('#ward').val();

            // Kiểm tra nếu người dùng chọn thêm mới tỉnh/thành phố
            if (provinceId === 'add_new_province') {
                $('#province').prop('disabled', true);
            }
            if (districtId === 'add_new_district') {
                $('#district').prop('disabled', true);
            }
            if (wardId === 'add_new_ward') {
                $('#ward').prop('disabled', true);
            }
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('#updateAddressButton').click(function() {
            var addressId = $('input[name="address_id"]:checked').val();
            
            if (addressId) {
                $.ajax({
                    url: '{{ route("checkout.updateAddressStatus") }}',
                    type: 'POST',
                    data: {
                        address_id: addressId,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        // Hiển thị thông báo thành công
                        $('#successMessage').text(response.success).show();
                        // Đóng modal
                        $('#selectAddressModal').modal('hide');
                        // Cập nhật danh sách địa chỉ nếu cần thiết
                        location.reload(); // Tải lại trang để cập nhật danh sách
                    },
                    error: function(xhr) {
                        // Hiển thị thông báo lỗi
                        alert('Có lỗi xảy ra, vui lòng thử lại.');
                    }
                });
            } else {
                alert('Vui lòng chọn địa chỉ để cập nhật.');
            }
        });
    });
</script>

{{-- <script>
    $(document).ready(function() {
        // Function to handle the default selected address
        $('#selectAddressModal').on('shown.bs.modal', function () {
            // Set the default address ID to be checked
            var defaultAddressId = "{{ $currentAddressId }}";
            if (defaultAddressId) {
                $('input[name="address_id"][value="' + defaultAddressId + '"]').prop('checked', true);
            }
        });

        // Handle address change in the modal
        $('#updateAddressButton').on('click', function() {
            var selectedAddressId = $('input[name="address_id"]:checked').val();
            if (selectedAddressId) {
                $('#selectedAddress input[name="address_id"]').val(selectedAddressId).prop('checked', true);
                $('#selectedAddress').html($('input[name="address_id"]:checked').next('span').html() + 
                    ' <button data-toggle="modal" data-target="#selectAddressModal">Thay đổi địa chỉ</button>');
                $('#selectAddressModal').modal('hide');
            }
        });
    });
</script> --}}
</body>
@endsection
<style>
    .product-info {
        font-family: Arial, sans-serif; /* Chọn font chữ phù hợp */
        margin: 10px 0; /* Khoảng cách trên và dưới */
    }

    .price-info {
        display: flex; /* Sử dụng Flexbox để căn chỉnh các phần tử */
        align-items: center; /* Căn giữa theo chiều dọc */
        justify-content: space-between; /* Căn đều không gian giữa các phần tử */
    }

    .original-price {
        text-decoration: line-through; /* Gạch ngang giá gốc */
        color: #888; /* Màu xám cho giá gốc */
        margin-right: 10px; /* Khoảng cách bên phải */
    }

    .sale-price {
        font-weight: bold; /* Làm đậm giá khuyến mãi */
        color: #d9534f; /* Màu đỏ cho giá khuyến mãi */
        margin-right: 10px; /* Khoảng cách bên phải */
    }

    .quantity {
        margin-right: 10px; /* Khoảng cách bên phải */
    }

    .total {
        font-weight: bold; /* Làm đậm tổng giá trị */
        color: #5cb85c; /* Màu xanh cho tổng giá trị */
    }

    .container {
        width: 100%; /* Chiều rộng 90% so với phần tử cha */
        max-width: 1200px; /* Chiều rộng tối đa là 1200px */
        margin: 0 auto; /* Canh giữa container */
        padding: 20px; /* Khoảng cách bên trong */
        background-color: #f8f9fa; /* Màu nền */
        border: 1px solid #ccc; /* Viền */
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); /* Đổ bóng */
        min-width: 1300px;
    }

    .selected-address {
        background-color: #f0f8ff; /* Màu nền nhạt cho địa chỉ đã chọn */
        border: 1px solid #d0e4f3; /* Viền màu nhạt để làm nổi bật */
    }
    /* Tạo kiểu cho nút 'Chỉnh sửa' hoặc 'Thay đổi địa chỉ' */
    .btn-edit {
        background-color: #4CAF50; /* Màu xanh lá cây (giống nút chỉnh sửa) */
        color: white;
        border: none;
        padding: 10px 15px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 14px;
        margin-left: 15px; /* Tạo khoảng cách giữa địa chỉ và nút */
        cursor: pointer;
        border-radius: 5px;
        transition: background-color 0.3s;
    }

    .btn-edit:hover {
        background-color: #45a049; /* Màu khi hover */
    }
    .hidden-radio {
        display: none; /* Ẩn radio button */
    }

    .address-border {
        border: 1px solid #ec9121; /* Viền màu xám nhạt */
        padding: 10px;
        margin-bottom: 10px;
        border-radius: 5px; /* Tạo viền bo tròn */
        text-align: center;
    }
    /* Định dạng cho modal */
    .modal-dialog {
        max-width: 800px; /* Kích thước tối đa của modal */
    }

    /* Danh sách địa chỉ cuộn khi dài */
    .address-list {
        max-height: 300px; /* Chiều cao tối đa của danh sách */
        overflow-y: auto; /* Thêm thanh cuộn dọc khi cần */
        padding-right: 15px; /* Thêm không gian cho thanh cuộn */
    }

    /* Loại bỏ dấu chấm đen trong danh sách */
    .address-list .list-unstyled {
        margin: 0;
        padding: 0;
        list-style: none; /* Loại bỏ dấu chấm đen */
    }

    /* Định dạng cho mỗi địa chỉ */
    .address-item {
        padding: 10px;
        border-bottom: 1px solid #ddd;
        display: flex;
        align-items: center;
        text-align: left; /* Căn trái văn bản */
    }

    /* Định dạng cho thông tin địa chỉ */
    .address-details {
        display: flex;
        align-items: center;
    }

    /* Định dạng cho địa chỉ đã chọn */
    .selected-address {
        background-color: #e9f5e9; /* Màu nền cho địa chỉ đã chọn */
        border-left: 4px solid #75de8d; /* Đường viền bên trái để đánh dấu */
        font-weight: bold;
    }

    /* Định dạng cho nút chỉnh sửa */
    .btn-edit-address {
        font-size: 14px;
        color: #007bff;
        text-decoration: none;
        border: none; /* Loại bỏ đường viền */
        background: none; /* Loại bỏ nền */
        padding: 0; /* Loại bỏ padding */
        margin-left: 10px; /* Khoảng cách giữa địa chỉ và nút */
    }

    .btn-edit-address:hover {
        text-decoration: underline;
    }

    /* Đánh dấu địa chỉ đã chọn */
    input[type="radio"]:checked + span {
        font-weight: bold;
        color: #28a745; /* Màu sắc cho địa chỉ đã chọn */
    }
</style>