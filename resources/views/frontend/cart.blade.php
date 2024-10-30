<!-- resources/views/frontend/cart.blade.php -->

@extends('layouts.site')
@section('title', 'Giỏ hàng')
@section('content')
{{-- <link rel="stylesheet" href="{{ asset('css/cart.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"> --}}


    <body>
    @include('frontend.header')
        <!-- Breadcrumb Start -->
        <div class="breadcrumb-wrap">
            <div class="container-fluid">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/')}}">Trang chủ</a></li>
                    <li class="breadcrumb-item"><a href="{{url('product')}}">Sản Phẩm</a></li>
                    <li class="breadcrumb-item active">Giỏ hàng</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumb End -->
        
        <!-- Cart Start -->
        <div class="cart-page">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="cart-page-inner">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>Sản phẩm</th>
                                            <th>Giá</th>
                                            <th>Số lượng</th>
                                            <th>Tổng cộng</th>
                                            <th>Xóa </th>
                                        </tr>
                                    </thead>
                                <tbody class="align-middle">
                                    @forelse ($cart as $id => $details)
                                        <tr>
                                            <td>
                                                <div class="img">
                                                    <a href="{{ route('product_detail', ['id' => $details->product->id]) }}">
                                                        @if(optional($details->product->images)->isNotEmpty())
                                                            <img src="{{ asset('img/products/' . $details->product->images->first()->filename) }}" alt="{{ $details->product->name }}">
                                                        @else
                                                            <img src="{{ asset('img/default-image.jpg') }}" alt="Default Image">
                                                        @endif
                                                    </a>
                                                    <p>{{ $details->product->name }}</p>
                                                </div>
                                            </td>
                                            <td>
                                                <span class="original-price">{{ number_format($details->product->price, 0, ',', '.') }} đ</span>
                                                <span class="sale-price">{{ number_format($details['price'], 0, ',', '.') }} đ</span>
                                            </td>
                                            <td>
                                                <div class="qty">
                                                    <button class="btn-minus" onclick="updateQuantity({{ $details->id }}, false)"><i class="fa fa-minus"></i></button>
                                                    <input type="text" value="{{ $details['quantity'] }}" id="quantity_{{ $details->id }}">
                                                    <button class="btn-plus" onclick="updateQuantity({{ $details->id }}, true)"><i class="fa fa-plus"></i></button>
                                                </div>
                                            </td>
                                            <td id="total_{{ $details->id }}">{{ number_format($details['price'] * $details['quantity'], 0, ',', '.') }} VNĐ</td>
                                            <td>
                                                <form action="{{ route('cart.remove', ['id' => $details->id]) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"><i class="fa fa-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center">Không có sản phẩm trong giỏ hàng.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                                <div class="cart-btn">
                                    <form action="{{ route('checkout_now') }}" method="GET">
                                        <button type="submit">Thanh Toán</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    {{-- <div class="col-lg-4">
                        <div class="cart-page-inner">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="coupon">
                                        <input type="text" placeholder="Mã giảm giá">
                                        <button>Áp dụng mã</button>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="cart-summary">
                                        <h4>Tóm tắt giỏ hàng</h4>
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <td>Tổng phụ:</td>
                                                    <td id="cartSubtotal">{{ number_format($cartSubtotal, 0, ',', '.') }} VNĐ</td>
                                                </tr>
                                                <tr>
                                                    <td>Phí vận chuyển:</td>
                                                    <td id="shippingCost">{{ number_format($shippingCost, 0, ',', '.') }} VNĐ</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Tổng cộng:</strong></td>
                                                    <td id="cartTotal"><strong>{{ number_format($cartTotal, 0, ',', '.') }} VNĐ</strong></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="cart-btn">
                                    <form action="{{ route('checkout_now') }}" method="GET">
                                        <button type="submit">Thanh Toán</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
        <!-- Cart End -->
        
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
    <script>
    function updateQuantity(id, isIncrement) {
        var quantityInput = $('#quantity_' + id);
        var currentQuantity = parseInt(quantityInput.val());
        var newQuantity = isIncrement ? currentQuantity + 1 : currentQuantity - 1;

        if (newQuantity < 1) return;

        // Gửi yêu cầu AJAX để cập nhật số lượng sản phẩm trong giỏ hàng
        $.ajax({
            url: '{{ route('cart.update', ':id') }}'.replace(':id', id),
            method: 'PUT',
            data: {
                quantity: newQuantity,
                _token: '{{ csrf_token() }}'
            },
            success: function (response) {
                if (response.success) {
                    // Cập nhật lại số lượng hiển thị
                    quantityInput.val(newQuantity);

                    // Cập nhật lại tổng tiền sản phẩm và tổng tiền giỏ hàng
                    $('#total_' + id).text(response.totalItemPrice);
                    $('#cartSubtotal').text(response.cartSubtotal);
                    $('#cartTotal').text(response.cartTotal);
                    $('#shippingCost').text(response.shippingCost);  // Phí vận chuyển nếu có
                } else {
                    alert(response.error);
                }
            },
            error: function (xhr) {
                alert('Có lỗi xảy ra: ' + xhr.responseText);
            }
        });
    }
    function removeItem(id) {
            $.ajax({
                url: '{{ route('cart.remove', '') }}/' + id, // Route xóa sản phẩm khỏi giỏ hàng
                method: 'DELETE', // Method DELETE
                data: {
                    _token: '{{ csrf_token() }}',
                    id: id
                },
                success: function(response) {
                    location.reload(); // Reload lại trang sau khi xóa thành công
                },
                error: function(xhr) {
                    console.log(xhr.responseText); // Log lỗi nếu có
                }
            });
        }
    </script>

@endsection
<style>
    .original-price {
        text-decoration: line-through; /* Gạch ngang giá gốc */
        color: #888; /* Màu xám cho giá gốc */
        margin-right: 10px; /* Khoảng cách bên phải */
    }

    .sale-price {
        font-weight: bold; /* Làm đậm giá khuyến mãi */
        color: #d9534f; /* Màu đỏ cho giá khuyến mãi */
    }

    .align-middle td{
        max-width: 300px;
    }
    .cart-btn {
        display: flex;
        justify-content: flex-end; /* Canh về phía bên phải */
        margin-left:200px;
        margin-top: 20px; /* Khoảng cách phía trên */
    }

    .cart-btn button {
        background-color: #ff6600; /* Màu cam */
        color: white; /* Màu chữ */
        padding: 15px 50px; /* Kích thước nút */
        font-size: 18px; /* Kích thước chữ to */
        border: none; /* Bỏ viền */
        border-radius: 5px; /* Bo góc */
        cursor: pointer; /* Thêm con trỏ dạng nhấn */
    }

    .cart-btn button:hover {
        background-color: #e65c00; /* Màu cam đậm hơn khi hover */
    }
</style>