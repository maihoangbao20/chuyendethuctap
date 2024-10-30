<?php

namespace App\Http\Controllers;

use App\Models\Authenticatable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function getlogin(Request $request)
    {
        // Lưu URL hiện tại trước khi vào trang đăng nhập
        $previousUrl = url()->previous();
        $request->session()->put('url.intended', $previousUrl);

        return view("layouts.login");
    }

    public function dologin(Request $request)
    {
        $credentials = [
            'password' => $request->password,
            'status' => 1
        ];

        if (filter_var($request->username, FILTER_VALIDATE_EMAIL)) {
            $credentials["email"]=$request->username;
        } else {
            $credentials["username"] = $request->username;
        }
        if(Auth::attempt($credentials)){
            $user = Auth::user();
            if ($user->status != 1) {
                return redirect()->route('website.getlogin')->with('message', 'Tài khoản chưa kích hoạt');
            }
            return redirect()->intended(route('site.home'));
        }
        else {
            return redirect()->route('website.getlogin')->with('message', 'Đăng nhập không thành công');
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('site.home');
    }
    public function showAccountDetails()
    {
        $user = Auth::user();
        return view('frontend.my_account', compact('user'));
    }
    public function updateAccount(Request $request)
    {
        $user = Auth::user();

        if (!Hash::check($request->input('current_password'), $user->password)) {
            return response()->json(['success' => false, 'message' => 'Mật khẩu hiện tại không đúng.'], 400);
        }

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        $user->address = $request->input('address');

        if ($request->hasFile('avatar')) {
            $user->avatar = $request->file('avatar')->store('avatars');
        }

        $user->save();

        return response()->json(['success' => true, 'message' => 'Cập nhật tài khoản thành công.']);
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:6|confirmed',
        ]);

        if (!Hash::check($request->current_password, auth()->user()->password)) {
            return redirect()->back()->with('error', 'Mật khẩu hiện tại không đúng.');
        }

        $user = auth()->user();
        $user->password = Hash::make($request->new_password);
        $user->save();

        // Đăng xuất người dùng
        Auth::logout();

        // Chuyển hướng kèm thông báo thành công
        return redirect()->route('login')->with('success', 'Mật khẩu đã được thay đổi thành công. Vui lòng đăng nhập lại.');
    }
}
