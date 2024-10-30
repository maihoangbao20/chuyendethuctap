<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Topic;


class FilterProductsController extends Controller
{
    public function filterProducts(Request $request)
    {
        $query = Product::query();

        if ($request->has('category')) {
            $query->whereIn('category_id', $request->category);
        }

        if ($request->has('brand')) {
            $query->whereIn('brand_id', $request->brand);
        }

        if ($request->has('price')) {
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
}
