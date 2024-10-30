<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $keyword = $request->input('query');

        // Tìm kiếm sản phẩm theo từ khóa
        $products = Product::where('name', 'like', '%' . $keyword . '%')->where('status', 1)->paginate(12);

        $brands = Brand::where('status', 1)->get();
        $categories = Category::where('status', 1)->get();

        return view('frontend.product_search', compact('products', 'keyword', 'categories', 'brands'));
    }
}
