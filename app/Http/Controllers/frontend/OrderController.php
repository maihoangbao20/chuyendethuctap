<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use App\Models\Address;
use App\Models\Province;
use App\Models\District;
use App\Models\Ward;
use App\Models\User;
use App\Models\Cart;
use App\Models\OrderItem;
use App\Models\OrderOnline;




class OrderController extends Controller
{
    public function index()
    {
    }
    public function buyNow(Request $request, $product)
    {
        $product = Product::findOrFail($product);

        session()->put('buy_now_product', [
            "id" => $product->id,
            "name" => $product->name,
            "quantity" => 1,
            "price" => $product->price,
            "image" => $product->images->first()->filename ?? 'default-image.jpg'
        ]);

        return redirect()->route('checkout_now')->with('success', 'Product added to checkout.');
    }

    public function checkoutNow(Request $request)
    {
        $userId = auth()->id(); // Lấy ID người dùng đã đăng nhập
        $user = User::find($userId); // Lấy thông tin người dùng
        $cart = Cart::where('user_id', $user->id)->with('product.images')->get();

        // Lấy danh sách địa chỉ của người dùng, nếu có
        $addresses = $user ? Address::with(['province', 'district', 'ward'])->where('user_id', $userId)->get() : collect();
        // Xác định địa chỉ mặc định là địa chỉ đầu tiên (hoặc theo một cờ đánh dấu nếu cần)
        $selectedAddress = $addresses->first(); // Địa chỉ mặc định hiển thị đầu tiên

        // Danh sách các địa chỉ còn lại để chọn thay đổi địa chỉ
        $otherAddresses = $addresses->skip(1); // Bỏ qua địa chỉ đầu tiên
        // Lấy danh sách các tỉnh
        $provinces = Province::all();

        // Lấy sản phẩm từ giỏ hàng cho người dùng hiện tại
        $cartItems = Cart::where('user_id', $userId)->with('product')->get();

        // Tính tổng giá trị giỏ hàng
        $cartTotal = $cartItems->sum(function ($item) {
            return $item->price * $item->quantity; // Tính tổng giá trị
        });
        // Định nghĩa phí ship
        $shippingFee = 30000; // Hoặc bạn có thể tính phí ship động nếu cần

        // Tính tổng giá trị đơn hàng bao gồm phí ship
        $totalOrderValue = $cartTotal + $shippingFee;

        // Trả về view checkout_now với các biến cần thiết
        return view('frontend.checkout_now', compact('cart','cartItems', 'addresses', 'provinces', 'cartTotal', 'totalOrderValue', 'selectedAddress', 'otherAddresses', 'shippingFee'));
    }
    public function updateAddressStatus(Request $request)
    {
        $request->validate([
            'address_id' => 'required|integer|exists:addresses,id', // Kiểm tra ID địa chỉ
        ]);

        $selectedAddressId = $request->input('address_id');

        // Đặt tất cả địa chỉ có status = 2
        Address::where('status', 1)->update(['status' => 2]);

        // Cập nhật địa chỉ được chọn thành status = 1
        Address::where('id', $selectedAddressId)->update(['status' => 1]);

        return response()->json(['success' => 'Cập nhật địa chỉ thành công.']);
    }
    public function getDistricts(Request $request)
    {
        $provinceId = $request->input('province_id');
        $districts = District::where('province_id', $provinceId)->get();
        return response()->json($districts);
    }

    public function getWards(Request $request)
    {
        $districtId = $request->input('district_id');
        $wards = Ward::where('district_id', $districtId)->get();
        return response()->json($wards);
    }

    public function addAddress(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            // 'status' => 'nullable|in:0,1,2', // Kiểm tra giá trị của status
            'province_id' => 'nullable|exists:provinces,id',
            'new_province' => 'nullable|string|max:255',
            'district_id' => 'nullable|exists:districts,id',
            'new_district' => 'nullable|string|max:255',
            'ward_id' => 'nullable|exists:wards,id',
            'new_ward' => 'nullable|string|max:255',
            'street' => 'required|string|max:255',
            'specific' => 'nullable|string|max:255',
        ]);

        $address = new Address();
        $address->user_id = Auth::check() ? auth()->id() : null;

        // Xử lý các trường nhập mới
        if ($request->new_province) {
            $address->newprovince = $request->new_province;
            $address->province_id = null;
        } else {
            $address->province = $request->province_id;
            $address->province_name = Province::find($request->province_id)->name;
            $address->newprovince = null;
        }

        if ($request->new_district) {
            $address->newdistrict = $request->new_district;
            $address->district_id = null;
        } else {
            $address->district = $request->district_id;
            $address->district_name = District::find($request->district_id)->name;
            $address->newdistrict = null;
        }

        if ($request->new_ward) {
            $address->newward = $request->new_ward;
            $address->ward_id = null;
        } else {
            $address->ward = $request->ward_id;
            $address->ward_name = Ward::find($request->ward_id)->name;
            $address->newward = null;
        }

        $address->name = $request->name;
        $address->phone = $request->phone;
        $address->status = $request->status ?? 2; // Gán giá trị mặc định là 2 nếu không có giá trị
        $address->street = $request->street;
        $address->specific = $request->specific;
        $address->save();

        // Cập nhật địa chỉ đã chọn trong session
        $request->session()->put('current_address_id', $address->id);

        return redirect()->back()->with('success', 'Địa chỉ đã được lưu thành công.');
    }
    public function updateAddress(Request $request)
    {
        // Validate the request data
        $request->validate([
            'address_id' => 'required|exists:addresses,id',
            'province_id' => 'nullable|exists:provinces,id',
            'new_province' => 'nullable|string|max:255',
            'district_id' => 'nullable|exists:districts,id',
            'new_district' => 'nullable|string|max:255',
            'ward_id' => 'nullable|exists:wards,id',
            'new_ward' => 'nullable|string|max:255',
            'street' => 'required|string|max:255',
            'specific' => 'nullable|string|max:255',
        ]);

        // Find the address to be updated
        $address = Address::findOrFail($request->address_id);

        // Handle new provinces
        if ($request->filled('new_province')) {
            $address->newprovince = $request->new_province;
            $address->province = null;
            $address->province_name = null;
        } else {
            $address->province = $request->province_id;
            $address->province_name = $address->province ? Province::find($request->province_id)->name : null;
            $address->newprovince = null;
        }

        // Handle new districts
        if ($request->filled('new_district')) {
            $address->newdistrict = $request->new_district;
            $address->district = null;
            $address->district_name = null;
        } else {
            $address->district = $request->district_id;
            $address->district_name = $address->district ? District::find($request->district_id)->name : null;
            $address->newdistrict = null;
        }

        // Handle new wards
        if ($request->filled('new_ward')) {
            $address->newward = $request->new_ward;
            $address->ward = null;
            $address->ward_name = null;
        } else {
            $address->ward = $request->ward_id;
            $address->ward_name = $address->ward ? Ward::find($request->ward_id)->name : null;
            $address->newward = null;
        }

        // Update other fields
        $address->street = $request->street;
        $address->specific = $request->specific;

        // Save the updated address
        $address->save();

        // Redirect back with success message
        return redirect()->back()->with('success', 'Địa chỉ đã được cập nhật thành công.');
    }
    // public function checkoutCart(Request $request)
    // {
    //     $user = Auth::user();
    //     $addresses = $user ? Address::with(['province', 'district', 'ward'])->where('user_id', $user->id)->get() : collect();
    //     $provinces = Province::all();
    //     $cartItems = session()->get('cart', []);

    //     if (empty($cartItems)) {
    //         return redirect()->back()->with('error', 'Giỏ hàng trống.');
    //     }

    //     $cartTotal = array_sum(array_map(function ($item) {
    //         return $item['price'] * $item['quantity'];
    //     }, $cartItems));

    //     return view('frontend.checkout_cart', compact('cartItems', 'addresses', 'provinces', 'cartTotal'));
    // }
    // public function updateOrder(Request $request)
    // {
    //     // Validate input
    //     $request->validate([
    //         'selected_address' => 'required|exists:addresses,id',
    //         'total' => 'required|numeric',
    //         'shipping_fee' => 'required|numeric',
    //         // Thêm validation cho các trường khác nếu cần
    //     ]);

    //     // Lưu thông tin đơn hàng
    //     $order = new Order();
    //     $order->user_id = Auth::id(); // Lưu ID người dùng hiện tại (nếu đã đăng nhập)
    //     $order->address_id = $request->selected_address;
    //     $order->total = $request->total;
    //     $order->shipping_fee = $request->shipping_fee;
    //     $order->save();

    //     // Lưu các sản phẩm trong giỏ hàng
    //     $cart = session('cart'); // Giả sử giỏ hàng được lưu trong session
    //     foreach ($cart as $id => $details) {
    //         $orderItem = new OrderItem();
    //         $orderItem->order_id = $order->id;
    //         $orderItem->product_id = $id; // ID sản phẩm
    //         $orderItem->quantity = $details['quantity'];
    //         $orderItem->price = $details['price'];
    //         $orderItem->save();
    //     }

    //     // Xóa giỏ hàng sau khi đặt hàng
    //     session()->forget('cart');

    //     // Chuyển hướng hoặc trả về thông báo thành công
    //     return redirect()->route('checkout.success')->with('success', 'Đặt hàng thành công!');
    // }
    // public function storeOrder(Request $request)
    // {
    //     $user = Auth::user(); // Lấy thông tin người dùng hiện tại
    //     $cart = session()->get('cart'); // Giả định giỏ hàng lưu trong session

    //     if (!$cart || count($cart) === 0) {
    //         return redirect()->back()->with('error', 'Giỏ hàng trống.');
    //     }

    //     $totalAmount = array_reduce($cart, function ($carry, $item) {
    //         return $carry + $item['price'] * $item['quantity'];
    //     }, 0);

    //     // Tạo đơn hàng
    //     $order = OrderOnline::create([
    //         'user_id' => $user->id,
    //         'shipping_address' => $request->input('shipping_address'),
    //         'total_amount' => $totalAmount,
    //         'status' => 'pending',
    //     ]);

    //     // Lưu chi tiết đơn hàng
    //     foreach ($cart as $item) {
    //         OrderItem::create([
    //             'order_online_id' => $order->id,
    //             'product_id' => $item['product_id'],
    //             'quantity' => $item['quantity'],
    //             'price' => $item['price'],
    //         ]);
    //     }

    //     // Xóa giỏ hàng sau khi đặt hàng thành công
    //     session()->forget('cart');

    //     return redirect()->route('order.success')->with('success', 'Đơn hàng đã được đặt thành công!');
    // }
    public function updateOrder(Request $request)
    {
        // Xác thực người dùng
        $user = Auth::user();
        if (!$user) {
            return redirect()->route('login')->with('error', 'Bạn cần đăng nhập để đặt hàng.');
        }

        // Tìm địa chỉ giao hàng có status = 1
        $address = Address::where('user_id', $user->id)->where('status', 1)->first();
        if (!$address) {
            return redirect()->back()->with('error', 'Không có địa chỉ giao hàng hợp lệ.');
        }

        // Tạo chuỗi địa chỉ giao hàng từ địa chỉ đã chọn
        $shippingAddress = $address->name . ', ' . $address->phone . ', ' .
            $address->specific . ', ' . $address->street . ', ' .
            ($address->ward_name ?? 'N/A') . ', ' .
            ($address->district_name ?? 'N/A') . ', ' .
            ($address->province_name ?? 'N/A');

        // Tổng tiền của đơn hàng
        $totalOrderValue = $request->input('total');

        if (!is_numeric($totalOrderValue) || $totalOrderValue < 0) {
            return redirect()->back()->with('error', 'Tổng tiền không hợp lệ.');
        }

        // Tạo đơn hàng mới trong bảng order_onlines
        $order = new OrderOnline();
        $order->user_id = $user->id;
        $order->shipping_address = $shippingAddress;
        $order->total_amount = $totalOrderValue;
        $order->status = 'pending';
        $order->save();

        // Xử lý và lưu từng sản phẩm trong đơn hàng vào bảng order_items
        $products = $request->input('products', []);
        foreach ($products as $productData) {
            $product = Product::find($productData['id']);
            if ($product) {
                $order->items()->create([  // Sử dụng phương thức `create` trên quan hệ `items`
                    'product_id' => $product->id,
                    'quantity' => $productData['quantity'],
                    'price' => $productData['price']
                ]);
            }
        }

        return redirect()->route('checkout.confirmation')->with('success', 'Đơn hàng của bạn đã được đặt thành công!');
    }
}
