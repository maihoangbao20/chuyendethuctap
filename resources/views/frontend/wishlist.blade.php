@extends('layouts.site')
@section('title','EStore - Yêu Thích')
@section('content')

<body>
    @include('frontend.header')
    <!-- Breadcrumb Start -->
    <div class="breadcrumb-wrap">
        <div class="container-fluid">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('/')}}">Trang chủ</a></li>
                <li class="breadcrumb-item"><a href="{{url('product')}}">Sản phẩm</a></li>
                <li class="breadcrumb-item active">Danh sách yêu thích</li>
            </ul>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Wishlist Start -->
    <div class="wishlist-page">
        <div class="container-fluid">
            <div class="wishlist-page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Sản phẩm</th>
                                        <th>Giá</th>
                                        <th>Số lượng</th>
                                        <th>Thêm vào giỏ hàng</th>
                                        <th>Xóa</th>
                                    </tr>
                                </thead>
                                <tbody class="align-middle">
                                    @forelse ($wishlists as $wishlist)
                                    <tr>
                                        <td>
                                            <div class="img">
                                                <a href="{{ route('product_detail', ['id' => $wishlist->product->id]) }}">
                                                    @if($wishlist->product->images && $wishlist->product->images->isNotEmpty())
                                                    <img src="{{ asset('img/products/' . $wishlist->product->images->first()->filename) }}" alt="{{ $wishlist->product->name }}">
                                                    @else
                                                    <img src="{{ asset('img/default-image.jpg') }}" alt="Default Image">
                                                    @endif
                                                </a>
                                                <p>{{ $wishlist->product->name }}</p>
                                            </div>
                                        </td>
                                        <td>{{ number_format($wishlist->product->price, 0, ',', '.') }} đ</td>
                                        <td>
                                            <div class="qty">
                                                <button type="button" class="btn-minus" data-id="{{ $wishlist->id }}"><i class="fa fa-minus"></i></button>
                                                <input type="text" name="quantity" value="{{ $wishlist->quantity }}" readonly>
                                                <button type="button" class="btn-plus" data-id="{{ $wishlist->id }}"><i class="fa fa-plus"></i></button>
                                            </div>
                                        </td>
                                        <td>
                                            <a href="#" class="btn btn-primary btn-add-to-cart" data-product-id="{{ $wishlist->product->id }}">Thêm vào giỏ hàng</a>
                                        </td>
                                        <td>
                                            <form action="{{ route('wishlist.remove', ['id' => $wishlist->product->id]) }}" method="POST">
                                                @csrf
                                                <button type="submit"><i class="fa fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="5">Danh sách yêu thích của bạn trống.</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Wishlist End -->

    <!-- Footer Start -->
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
<script>
    $(document).ready(function() {
        // Xử lý khi click nút giảm số lượng
        $(document).on('click', '.btn-minus', function() {
            var $input = $(this).siblings('input');
            var currentValue = parseInt($input.val());
            var newValue = currentValue - 1;
            newValue = newValue < 1 ? 1 : newValue; // Giới hạn số lượng không dưới 1
            $input.val(newValue);

            var id = $(this).siblings('.btn-plus').data('id'); // Lấy id từ nút btn-plus cùng cấp
            updateQuantity(id, newValue);
        });

        // Xử lý khi click nút tăng số lượng
        $(document).on('click', '.btn-plus', function() {
            var $input = $(this).siblings('input');
            var currentValue = parseInt($input.val());
            var newValue = currentValue + 1;
            $input.val(newValue);

            var id = $(this).data('id'); // Lấy id từ nút btn-plus
            updateQuantity(id, newValue);
        });

        // Hàm cập nhật số lượng thông qua AJAX
        function updateQuantity(id, quantity) {
            $.ajax({
                url: '{{ route('wishlist.update') }}',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    id: id,
                    quantity: quantity
                },
                success: function(response) {
                    console.log('Cập nhật số lượng thành công');
                },
                error: function(response) {
                    console.log('Lỗi khi cập nhật số lượng');
                }
            });
        }

    });
</script>


@endsection
