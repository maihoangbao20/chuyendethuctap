<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function addToWishlist($id)
    {
        $userId = auth()->id();
        $wishlistItem = Wishlist::where('user_id', $userId)->where('product_id', $id)->first();

        if ($wishlistItem) {
            // If the product already exists in the wishlist, increase the quantity
            $wishlistItem->quantity += 1;
            $wishlistItem->save();
        } else {
            // Otherwise, add the product to the wishlist with a quantity of 1
            Wishlist::create([
                'user_id' => $userId,
                'product_id' => $id,
                'quantity' => 1
            ]);
        }

        return redirect()->route('wishlist');
    }
    public function removeFromWishlist($productId)
    {
        $user = Auth::user();

        if ($user) {
            Wishlist::where('user_id', $user->id)->where('product_id', $productId)->delete();

            return redirect()->back()->with('success', 'Sản phẩm đã được xóa khỏi danh sách yêu thích.');
        }

        return redirect()->route('login'); // Updated route name
    }

    public function showWishlist()
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('alert', 'Bạn cần đăng nhập để xem danh sách yêu thích.');
        }

        $user = Auth::user();
        $wishlists = Wishlist::where('user_id', $user->id)->with('product.images')->get();

        return view('frontend.wishlist', compact('wishlists'));
    }

    public function updateQuantity(Request $request)
    {
        $wishlist = Wishlist::where('id', $request->id)->where('user_id', auth()->id())->first();
        if ($wishlist) {
            $wishlist->quantity = $request->quantity;
            $wishlist->save();
            return response()->json(['success' => true]);
        }
        return response()->json(['success' => false]);
    }
}