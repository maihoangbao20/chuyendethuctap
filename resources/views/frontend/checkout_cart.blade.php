{{-- <!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>E Store - eCommerce HTML Template</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="eCommerce HTML Template Free Download" name="keywords">
        <meta content="eCommerce HTML Template Free Download" name="description">

        <!-- Favicon -->
        <link href="img/favicon.ico" rel="icon">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400|Source+Code+Pro:700,900&display=swap" rel="stylesheet">

        <!-- CSS Libraries -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <link href="lib/slick/slick.css" rel="stylesheet">
        <link href="lib/slick/slick-theme.css" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="css/style.css" rel="stylesheet">
    </head>

    <body>
    @include('frontend.header')
        
        <!-- Breadcrumb Start -->
        <div class="breadcrumb-wrap">
            <div class="container-fluid">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/')}}">Trang chủ</a></li>
                    <li class="breadcrumb-item"><a href="{{url('cart')}}">Giỏ hàng</a></li>
                    <li class="breadcrumb-item active">Thanh toán</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumb End -->
        
        <!-- Checkout Start -->
        <div class="checkout">
            <div class="container-fluid"> 
                <div class="row">
                    <div class="col-lg-8">
                        <div class="checkout-inner">
                            <div class="billing-address">
                                <h2>Thông tin thanh toán</h2>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Họ</label>
                                        <input class="form-control" type="text" placeholder="Họ">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Tên"</label>
                                        <input class="form-control" type="text" placeholder="Tên">
                                    </div>
                                    <div class="col-md-6">
                                        <label>E-mail</label>
                                        <input class="form-control" type="text" placeholder="E-mail">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Số điện thoại</label>
                                        <input class="form-control" type="text" placeholder="Số điện thoại">
                                    </div>
                                    <div class="col-md-12">
                                        <label>Địa chỉ</label>
                                        <input class="form-control" type="text" placeholder="Địa chỉ">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Quốc gia</label>
                                        <select class="custom-select">
                                            <option selected>United States</option>
                                            <option>Afghanistan</option>
                                            <option>Albania</option>
                                            <option>Algeria</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Thành phố</label>
                                        <input class="form-control" type="text" placeholder="Thành phố">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Tình trạng</label>
                                        <input class="form-control" type="text" placeholder="Tình trạng">
                                    </div>
                                    <div class="col-md-6">
                                        <label>ZIP Code</label>
                                        <input class="form-control" type="text" placeholder="ZIP Code">
                                    </div>
                                    <div class="col-md-12">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="newaccount">
                                            <label class="custom-control-label" for="newaccount">Tạo một tài khoản</label>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="shipto">
                                            <label class="custom-control-label" for="shipto">Gửi đến địa chỉ khác</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="shipping-address">
                                <h2>Shipping Address</h2>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>First Name</label>
                                        <input class="form-control" type="text" placeholder="First Name">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Last Name"</label>
                                        <input class="form-control" type="text" placeholder="Last Name">
                                    </div>
                                    <div class="col-md-6">
                                        <label>E-mail</label>
                                        <input class="form-control" type="text" placeholder="E-mail">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Mobile No</label>
                                        <input class="form-control" type="text" placeholder="Mobile No">
                                    </div>
                                    <div class="col-md-12">
                                        <label>Address</label>
                                        <input class="form-control" type="text" placeholder="Address">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Country</label>
                                        <select class="custom-select">
                                            <option selected>United States</option>
                                            <option>Afghanistan</option>
                                            <option>Albania</option>
                                            <option>Algeria</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label>City</label>
                                        <input class="form-control" type="text" placeholder="City">
                                    </div>
                                    <div class="col-md-6">
                                        <label>State</label>
                                        <input class="form-control" type="text" placeholder="State">
                                    </div>
                                    <div class="col-md-6">
                                        <label>ZIP Code</label>
                                        <input class="form-control" type="text" placeholder="ZIP Code">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="checkout-inner">
                            <div class="checkout-summary">
                                <h1>Tổng giỏ hàng</h1>
                                <p>Tên sản phẩm<span>99₫</span></p>
                                <p class="sub-total">Tổng phụ<span>99₫</span></p>
                                <p class="ship-cost">Phí vận chuyển<span>1₫</span></p>
                                <h2>Tổng cộng<span>100₫</span></h2>
                            </div>

                            <div class="checkout-payment">
                                <div class="payment-methods">
                                    <h1>Phương thức thanh toán</h1>
                                    <div class="payment-method">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" id="payment-1" name="payment">
                                            <label class="custom-control-label" for="payment-1">Paypal</label>
                                        </div>
                                        <div class="payment-content" id="payment-1-show">
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras tincidunt orci ac eros volutpat maximus lacinia quis diam.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="payment-method">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" id="payment-2" name="payment">
                                            <label class="custom-control-label" for="payment-2">Payoneer</label>
                                        </div>
                                        <div class="payment-content" id="payment-2-show">
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras tincidunt orci ac eros volutpat maximus lacinia quis diam.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="payment-method">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" id="payment-3" name="payment">
                                            <label class="custom-control-label" for="payment-3">Thanh toán bằng séc</label>
                                        </div>
                                        <div class="payment-content" id="payment-3-show">
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras tincidunt orci ac eros volutpat maximus lacinia quis diam.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="payment-method">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" id="payment-4" name="payment">
                                            <label class="custom-control-label" for="payment-4">Chuyển khoản ngân hàng</label>
                                        </div>
                                        <div class="payment-content" id="payment-4-show">
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras tincidunt orci ac eros volutpat maximus lacinia quis diam.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="payment-method">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" id="payment-5" name="payment">
                                            <label class="custom-control-label" for="payment-5">Thanh toán khi nhận hàng</label>
                                        </div>
                                        <div class="payment-content" id="payment-5-show">
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras tincidunt orci ac eros volutpat maximus lacinia quis diam.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="checkout-btn">
                                    <button>Đặt hàng</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Checkout End -->
        
    @include('frontend.footer')
        <!-- Back to Top -->
        <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
        
        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
        <script src="lib/easing/easing.min.js"></script>
        <script src="lib/slick/slick.min.js"></script>
        
        <!-- Template Javascript -->
        <script src="js/main.js"></script>
    </body>
</html> --}}
@extends('layouts.site')
@section('title', 'Thanh toán')
@section('content')

<body>
@include('frontend.header')

<div class="container">
    <h2>Thông tin thanh toán</h2>
    <div class="row">
      <div class="col-md-8">
            <h4>Địa chỉ giao hàng</h4>
            @if($addresses->isEmpty())
                <p>Chưa có địa chỉ giao hàng</p>
                <button data-toggle="modal" data-target="#addAddressModal">+ Thêm địa chỉ giao hàng</button>
            @else
                <ul>
                @foreach($addresses as $address)
                    <li>
                        <input type="radio" name="address_id" value="{{ $address->id }}">
                        {{ $address->name}} -
                        {{ $address->phone }} -
                        {{ $address->specific}} -
                        {{ $address->street }} -
                        {{ $address->ward_name ?? 'N/A' }} -
                        {{ $address->district_name ?? 'N/A' }} -
                        {{ $address->province_name ?? 'N/A' }}
                    </li>
                @endforeach
                </ul>
                <button data-toggle="modal" data-target="#selectAddressModal">Thay đổi địa chỉ</button>
            @endif
        </div>
        <div class="col-md-4">
            <h4>Thông tin đơn hàng</h4>
            <form action="{{ route('checkout.updateOrder') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="voucher">Chọn voucher:</label>
                    <select id="voucher" name="voucher_id" class="form-control">
                        <option value="">Chọn voucher</option>
                        <!-- Populate vouchers here -->
                    </select>
                </div>

                <div class="form-group">
                    <label for="shipping_fee">Phí ship:</label>
                    <input type="text" id="shipping_fee" name="shipping_fee" class="form-control" value="0" readonly>
                </div>

                <div class="form-group">
                    <label for="total">Tổng giá trị đơn hàng:</label>
                    <input type="text" id="total" name="total" class="form-control" value="{{ number_format($cartTotal, 0, ',', '.') }} VNĐ" readonly>
                </div>

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
                            <li class="address-item row {{ $address->id == old('address_id') ? 'selected-address' : '' }}">
                                <div class="col-md-9 address-details">
                                    <!-- Radio button để chọn địa chỉ -->
                                    <input type="radio" name="address_id" value="{{ $address->id }}" id="address-{{ $address->id }}" {{ $address->id == old('address_id') ? 'checked' : '' }}>
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
                <button type="button" class="btn btn-primary" id="updateAddressButton">Cập nhật địa chỉ</button>
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