<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Topic;


use App\Models\Product;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
        $topics = Topic::where('status', 1)->get();
        $products = Product::where('status', 1)
        ->paginate(12);

        $brands = Brand::where('status', 1)->get();
        $categories = Category::where('status', 1)->get();

        return view('frontend.product',compact('products', 'categories','brands', 'topics'));
    }
    public function productsByCategory($id)
    {
        $topics = Topic::where('status', 1)->get();
        $brands = Brand::where('status', 1)->get();
        $categories = Category::where('status', 1)->get();
        $category = Category::findOrFail($id);
        $products = Product::where('category_id', $category->id)
            ->where('status', 1)
            ->paginate(4);
        return view('frontend.products_by_category', compact('products', 'category', 'categories','brands', 'topics'));
    }
    public function productsByBrand($brandId)
    {
        $topics = Topic::where('status', 1)->get();
        $brand = Brand::findOrFail($brandId);
        $categories = Category::where('status', 1)->get();
        $products = Product::where('brand_id', $brandId)
            ->where('status', 1)
            // ->whereNotNull('pricesale')
            ->paginate(4);
        $brands = Brand::where('status', 1)->get();
        return view('frontend.products_by_brand', compact('products', 'brands', 'brand','categories', 'topics'));
    }
    public function product_detail($id)
    {
        $product = Product::with('images','sizes')->findOrFail($id);
        $productorder = Product::where('status', 1)
        ->paginate(12);
        $topics = Topic::where('status', 1)->get();
        $brands = Brand::where('status', 1)->get();
        $categories = Category::where('status', 1)->get();
        $productsale = Product::where('id', '!=', $id)
            ->where('status', 1)
            ->get();
        return view('frontend.product_detail', compact('product', 'productorder', 'productsale', 'categories','brands', 'topics'));
    }
    public function product_news()
    {
        $productnews = Product::orderBy('created_at', 'desc')
            ->where('status', 1)
            ->paginate(12);
        $topics = Topic::where('status', 1)->get();
        $brands = Brand::where('status', 1)->get();
        $categories = Category::where('status', 1)->get();
        $latestProducts = Product::where('status', 1)
        ->orderBy('created_at', 'desc')
        ->take(5)
        ->get();

        $productsale = Product::where('status', 1)
        ->whereNotNull('pricesale')
        ->orderBy('updated_at', 'desc')
        ->get();

        return view('frontend.product_news', compact('productnews','latestProducts', 'productsale', 'categories','brands', 'topics'));
    }
    public function product_sale()
    {
        $list = DB::table('menu')->get();
        $productsale = Product::whereNotNull('pricesale')
            ->where('status', 1)
            ->paginate(12);
        $topics = Topic::where('status', 1)->get();
        $brands = Brand::where('status', 1)->get();
        $categories = Category::where('status', 1)->get();
        return view('frontend.product_sale', compact('list', 'productsale', 'categories','brands', 'topics'));
    }
    public function search(Request $request)
    {
        $topics = Topic::where('status', 1)->get();
        $brands = Brand::where('status', 1)->get();
        $categories = Category::where('status', 1)->get();

        $keyword = $request->input('keyword');
        $products = Product::where('status', 1)
            ->where('name', 'like', "%$keyword%")
            ->get();

        return view('frontend.search', compact('products', 'keyword', 'categories', 'brands', 'topics'));
    }
}
