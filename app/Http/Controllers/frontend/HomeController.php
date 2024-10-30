<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Topic;
use App\Models\Post;


use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $list = DB::table('menu')->get();
        $productsale = Product::whereNotNull('pricesale')
        ->where('status', 1)
        ->get();
        $productnews = Product::orderBy('created_at', 'desc')
        ->where('status', 1)
        ->get();
        $categories = Category::where('status', 1)->get();
        $brands = Brand::where('status', 1)->get();
        $topics = Topic::where('status', 1)->get();
        return view('frontend.home', compact('productnews','list','productsale', 'categories','brands','topics'));
    }
    public function productsByCategory($categoryId)
    {
        $topics = Topic::where('status', 1)->get();
        $category = Category::findOrFail($categoryId);
        $products = Product::where('category_id', $categoryId)
            ->where('status', 1)
            ->whereNotNull('pricesale')
            ->get();
        $categories = Category::where('status', 1)->get();
        return view('frontend.products_by_category', compact('products', 'categories','category', 'topics'));
    }
    public function productsByBrand($brandId)
    {
        $topics = Topic::where('status', 1)->get();
        $brand = Brand::findOrFail($brandId);
        $products = Product::where('brand_id', $brandId)
            ->where('status', 1)
            ->whereNotNull('pricesale')
            ->get();
        $brands = Brand::where('status', 1)->get();
        return view('frontend.products_by_brand', compact('products', 'brands','brand', 'topics'));
    }
    public function postsByTopic($topicId)
    {
        $categories = Category::where('status', 1)->get();
        $brands = Brand::where('status', 1)->get();
        $topic = Topic::findOrFail($topicId);
        $posts = Post::where('topic_id', $topicId)
            ->where('status', 1)
            ->get();
        $topics = Topic::where('status', 1)->get();
        return view('frontend.posts_by_topic', compact('posts', 'topics','topic', 'categories', 'brands'));
    }
    public function filtered_products(Request $request)
    {
        // Khởi tạo query cho bảng Product
        $query = Product::query();

        // Xử lý các điều kiện lọc nếu có
        if ($request->has('category') && $request->category) {
            $query->whereIn('category_id', $request->category);
        }

        if ($request->has('brand') && $request->brand) {
            $query->whereIn('brand_id', $request->brand);
        }

        if ($request->has('price') && $request->price) {
            $priceRange = explode('-', $request->price);
            if (count($priceRange) == 2) {
                $query->whereBetween('price', [$priceRange[0], $priceRange[1]]);
            } else if ($request->price == '5000000+') {
                $query->where('price', '>', 5000000);
            }
        }

        $products = $query->where('status', 1)->get();
        $categories = Category::where('status', 1)->get();
        $brands = Brand::where('status', 1)->get();
        $topics = Topic::where('status', 1)->get();
        $productsale = Product::whereNotNull('pricesale')
        ->where('status', 1)
        ->get();

        return view('frontend.home', compact('products', 'categories', 'brands', 'topics', 'productsale'));
    }
    public function showFilterForm()
    {
        $categories = Category::where('status', 1)->get();
        $brands = Brand::where('status', 1)->get();
        $topics = Topic::where('status', 1)->get();
        $productsale = Product::whereNotNull('pricesale')
        ->where('status', 1)
        ->get();
        return view('frontend.home', compact('categories', 'brands', 'topics','productsale'));
    }
    public function showHomePage()
    {
        // Example: Set the flash sale end time
        $flashSaleEndTime = now()->addHours(24); // Adjust as per your requirement

        // Pass the variable to the Blade view
        return view('frontend.home', compact('flashSaleEndTime'));
    }}
