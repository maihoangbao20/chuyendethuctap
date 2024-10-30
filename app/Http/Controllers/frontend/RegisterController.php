<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Topic;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function index()
    {
        $categories = Category::where('status', 1)->get();
        $brands = Brand::where('status', 1)->get();
        $topics = Topic::where('status', 1)->get();

        return view('frontend.register', compact('categories', 'brands', 'topics'));
    }

    public function register(Request $request)
    {
        $messages = [
            'name.required' => 'Vui lòng nhập tên.',
            'name.string' => 'Tên phải là một chuỗi ký tự.',
            'name.max' => 'Tên không được vượt quá 255 ký tự.',

            'phone.required' => 'Vui lòng nhập số điện thoại.',
            'phone.string' => 'Số điện thoại phải là một chuỗi ký tự.',
            'phone.max' => 'Số điện thoại không được vượt quá 15 ký tự.',

            'email.required' => 'Vui lòng nhập email.',
            'email.string' => 'Email phải là một chuỗi ký tự.',
            'email.email' => 'Vui lòng nhập địa chỉ email hợp lệ.',
            'email.max' => 'Email không được vượt quá 255 ký tự.',

            'username.required' => 'Vui lòng nhập tên đăng nhập.',
            'username.string' => 'Tên đăng nhập phải là một chuỗi ký tự.',
            'username.max' => 'Tên đăng nhập không được vượt quá 255 ký tự.',
            'username.unique' => 'Tên đăng nhập này đã được sử dụng.',

            'password.required' => 'Vui lòng nhập mật khẩu.',
            'password.string' => 'Mật khẩu phải là một chuỗi ký tự.',
            'password.min' => 'Mật khẩu phải có ít nhất 6 ký tự.',
            'password.confirmed' => 'Xác nhận mật khẩu không khớp.',

            'gender.required' => 'Vui lòng chọn giới tính.',
            'gender.string' => 'Giới tính phải là một chuỗi ký tự.',
            'gender.in' => 'Giới tính không hợp lệ.',

            'address.string' => 'Địa chỉ phải là một chuỗi ký tự.',
            'address.max' => 'Địa chỉ không được vượt quá 255 ký tự.',
        ];

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'email' => 'required|string|email|max:255',
            'username' => 'required|string|max:255|unique:users',
            'password' => [
                'required',
                'string',
                'min:8', // Mật khẩu ít nhất 8 ký tự
                'confirmed',
                'regex:/[a-z]/', // Ít nhất một chữ thường
                'regex:/[A-Z]/', // Ít nhất một chữ hoa
                'regex:/[0-9]/', // Ít nhất một chữ số
                'regex:/[@$!%*#?&]/', // Ít nhất một ký tự đặc biệt
            ],
        ], [
            'password.regex' => 'Mật khẩu phải có ít nhất một ký tự chữ hoa, chữ thường, số và ký tự đặc biệt.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        User::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'gender' => $request->gender,
            // 'address' => $request->address,
            'roles' => 'customer',
        ]);

        return redirect()->route('login')->with('success', 'Đăng ký thành công! Bạn có thể đăng nhập ngay bây giờ.');
    }
}
