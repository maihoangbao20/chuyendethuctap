<?php
namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Topic;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    // public function index()
    // {
    //     $categories = Category::where('status', 1)->get();
    //     $brands = Brand::where('status', 1)->get();
    //     $topics = Topic::where('status', 1)->get();

    //     return view('frontend.login', compact('categories', 'brands', 'topics'));
    // }

    // public function login(Request $request)
    // {
    //     $request->validate([
    //         'username' => 'required|string|max:255',
    //         'password' => 'required|string|min:6',
    //     ]);

    //     $credentials = $request->only('username', 'password');

    //     if (Auth::attempt($credentials)) {
    //         return redirect()->intended('dashboard');
    //     } else {
    //         return redirect()->back()->withErrors([
    //             'username' => 'Tên đăng nhập hoặc mật khẩu không đúng.',
    //         ])->withInput();
    //     }
    // }
}
