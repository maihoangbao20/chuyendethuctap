<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Contact;

use App\Models\Topic;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    public function index()
    {
        $categories = Category::where('status', 1)->get();
        $brands = Brand::where('status', 1)->get();
        $topics = Topic::where('status', 1)->get();

        return view('frontend.contact', compact('categories','brands','topics'));
    }
    public function store(Request $request)
    {
        $user_id = Auth::id();
        if (!Auth::check()) {
            return response()->json(['message' => 'Bạn cần đăng nhập để gửi thông tin liên hệ.'], 401);
        }
        // Validate dữ liệu từ form
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'title' => 'nullable|string|max:255',
            'content' => 'required|string',
        ]);

        // Lấy user_id của người dùng đã đăng nhập

        // Lưu thông tin liên hệ vào cơ sở dữ liệu
        Contact::create([
            'user_id' => $user_id,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'title' => $request->title,
            'content' => $request->content,
        ]);
        // Redirect về trang liên hệ với thông báo thành công
        return redirect()->route('cart.index');
    }

    public function showcontact(Request $request)
    {
        $contacts = Contact::where('user_id', auth()->id())->get();
        return view('frontend.my_contact', compact('contacts'));
    }
}
