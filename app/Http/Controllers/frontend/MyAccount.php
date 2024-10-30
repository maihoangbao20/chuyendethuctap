<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Topic;
use App\Models\Order;
use App\Models\Orderdetail;
use Illuminate\Support\Facades\Auth;


class MyAccount extends Controller
{
    public function index (Request $request)
    {
        return view('frontend.my_account');
    }
    
}
