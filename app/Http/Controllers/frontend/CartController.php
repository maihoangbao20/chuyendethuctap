<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Topic;
use App\Models\Order;
use App\Models\Cart;
use App\Models\Address;
use App\Models\Province;
use Illuminate\Support\Facades\Log;
use App\Models\Orderdetail;
use Illuminate\Support\Facades\Auth;


class CartController extends Controller
{
    public function addToCart(Request $request, $id)
    {
        $userId = auth()->id();
        $product = Product::find($id);
        // if (!$product) {
        //     return response()->json(['message' => 'Sản phẩm không tồn tại.'], 401);
        // }
        if (!$userId) {
            return response()->json(['message' => 'Bạn cần đăng nhập để thêm vào giỏ hàng.'], 401);
        }
        $cart = Cart::where('user_id', $userId)->where('product_id', $id)->first();

        if ($cart) {
            // Nếu sản phẩm đã tồn tại trong giỏ hàng, tăng số lượng
            $cart->quantity += 1;
            $cart->save();
        } else {
            // Nếu không, thêm sản phẩm vào giỏ hàng với số lượng 1
            Cart::create([
                'user_id' => $userId,
                'product_id' => $id,
                'quantity' => 1,
                'price' => $product->pricesale ?? $product->price
            ]);
        }
        return redirect()->route('cart.index');

        // return response()->json([
        //     'message' => 'Sản phẩm đã được thêm vào giỏ hàng.',
        //     'cart_url' => route('cart.index')
        // ]);
    }
    public function index()
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('alert', 'Bạn cần đăng nhập để xem giỏ hàng.');
        }
        $user = Auth::user();
        $categories = Category::where('status', 1)->get();
        $brands = Brand::where('status', 1)->get();
        $topics = Topic::where('status', 1)->get();

        $cart = Cart::where('user_id', $user->id)->with('product.images')->get();
        $cartTotalItems = $cart->count();
        $cartSubtotal = 0;

        foreach ($cart as $item) {
            $cartSubtotal += $item->price * $item->quantity;
        }

        $shippingCost = 10000;
        $cartTotal = $cartSubtotal + $shippingCost;

        return view('frontend.cart', compact('cart', 'cartTotalItems', 'cartSubtotal', 'shippingCost', 'cartTotal', 'categories', 'brands', 'topics'));
    }

    public function update(Request $request, $id)
    {
        try {
            if ($id && $request->quantity) {
                $cart = Cart::findOrFail($id);
                $cart->quantity = $request->quantity;
                $cart->save();

                // Tính lại giá trị tổng cộng cho sản phẩm và giỏ hàng
                $cartItems = Cart::where('user_id', auth()->id())->get();
                $cartSubtotal = 0;

                foreach ($cartItems as $item) {
                    $cartSubtotal += $item->price * $item->quantity;
                }

                $shippingCost = 10000;  // Giả định phí vận chuyển tĩnh (có thể thay đổi)
                $cartTotal = $cartSubtotal + $shippingCost;

                return response()->json([
                    'success' => true,
                    'totalItemPrice' => number_format($cart->price * $cart->quantity, 0, ',', '.') . ' VNĐ',
                    'cartSubtotal' => number_format($cartSubtotal, 0, ',', '.') . ' VNĐ',
                    'cartTotal' => number_format($cartTotal, 0, ',', '.') . ' VNĐ',
                    'shippingCost' => number_format($shippingCost, 0, ',', '.') . ' VNĐ'
                ]);
            }

            return response()->json(['success' => false, 'error' => 'ID hoặc số lượng không hợp lệ.']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => 'Có lỗi xảy ra: ' . $e->getMessage()]);
        }
    }

    public function remove($id)
    {
        $cart = Cart::findOrFail($id);
        $cart->delete();

        return redirect()->back()->with('success', 'Sản phẩm đã được xóa khỏi giỏ hàng.');
    }
    // public function checkout(Request $request)
    // {
    //     // Lấy thông tin người dùng hiện tại (nếu có)
    //     $user = Auth::user();

    //     // Nếu người dùng đã đăng nhập, lấy các địa chỉ của họ, nếu không, trả về một collection rỗng
    //     $addresses = $user ? Address::with(['province', 'district', 'ward'])->where('user_id', $user->id)->get() : collect();

    //     // Lấy danh sách các tỉnh cho việc chọn địa chỉ
    //     $provinces = Province::all();

    //     // Lấy giỏ hàng từ session
    //     $cartItems = session()->get('cart', []);

    //     // Kiểm tra nếu giỏ hàng trống
    //     if (empty($cartItems)) {
    //         return redirect()->back()->with('error', 'Giỏ hàng trống.');
    //     }

    //     // Tính tổng giá trị của giỏ hàng
    //     $cartTotal = array_sum(array_map(function ($item) {
    //         return $item['price'] * $item['quantity'];
    //     }, $cartItems));

    //     // Trả về view checkout với các biến dữ liệu cần thiết
    //     return view('frontend.checkout', compact('cartItems', 'addresses', 'provinces', 'cartTotal'));
    // }
    public function docheckout(Request $request)
    {
        $user = Auth::user();
        $carts = session('cart', []);

        if (count($carts) > 0) {
            $order = new Order();
            $order->user_id = $user->id;
            $order->delivery_name = $request->name;
            $order->delivery_gender = $user->gender;
            $order->delivery_email = $request->email;
            $order->delivery_phone = $request->phone;
            $order->delivery_address = $request->address;
            $order->note = $request->note;
            $order->created_at = now();
            $order->type = 'online';
            $order->status = 2; // Assuming status 2 means placed, adjust as per your status definitions

            if ($order->save()) {
                foreach ($carts as $id => $details) {
                    $orderdetail = new Orderdetail();
                    $orderdetail->order_id = $order->id;
                    $orderdetail->product_id = $id; // Assuming $id is the product_id
                    $orderdetail->price = $details['price'];
                    $orderdetail->qty = $details['quantity'];
                    $orderdetail->discount = 0; // Assuming no discount for now
                    $orderdetail->amount = $details['price'] * $details['quantity'];
                    $orderdetail->save();
                }

                // Clear the cart session after successfully saving the order
                session()->forget('cart');

                return redirect()->route('frontend.checkout_message', ['order_id' => $order->id]);
            }
        }

        // Handle case where order couldn't be saved (optional)
        return redirect()->back()->with('error', 'Đã xảy ra lỗi khi đặt hàng. Vui lòng thử lại.');
    }
    public function checkoutMessage($order_id)
    {
        $order = Order::findOrFail($order_id);
        $orderDetails = $order->orderDetails;
        $total = $orderDetails->sum('amount');

        return view('frontend.checkout_message', compact('order', 'total', 'orderDetails'));
    }
    // public function buyNow(Product $product)
    // {
    //     // Thêm sản phẩm vào giỏ hàng
    //     $cart = session()->get('cart', []);

    //     $product_id = $product->id;
    //     $cart[$product_id] = [
    //         "name" => $product->name,
    //         "quantity" => 1,
    //         "price" => $product->pricesale ? $product->pricesale : $product->price,
    //         "image" => $product->image
    //     ];

    //     session()->put('cart', $cart);

    //     return redirect()->route('checkout');
    // }
    public function someControllerMethod()
    {
        if (Auth::check()) {
            $cartTotalItems = Cart::where('user_id', Auth::id())->sum('quantity');
        } else {
            $cartTotalItems = 0;
        }

        return view('some.view', compact('cartTotalItems'));
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


}
