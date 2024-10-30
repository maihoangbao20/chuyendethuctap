<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Topic;

class PageController extends Controller
{
    public function gioiThieu()
    {
        $brands = Brand::where('status', 1)->get();
        $topics = Topic::where('status', 1)->get();
        $categories = Category::where('status', 1)->get();
        return view('frontend.gioi_thieu', compact('categories','brands','topics'));
    }

    public function chinhSachMuaHang()
    {
        $brands = Brand::where('status', 1)->get();
        $topics = Topic::where('status', 1)->get();
        $categories = Category::where('status', 1)->get();
        return view('frontend.chinh_sach_mua_hang', compact('categories', 'brands', 'topics'));
    }

    public function chinhSachBaoHanh()
    {
        $brands = Brand::where('status', 1)->get();
        $topics = Topic::where('status', 1)->get();
        $categories = Category::where('status', 1)->get();
        return view('frontend.chinh_sach_bao_hanh', compact('categories', 'brands', 'topics'));
    }

    public function chinhSachVanChuyen()
    {
        $brands = Brand::where('status', 1)->get();
        $topics = Topic::where('status', 1)->get();
        $categories = Category::where('status', 1)->get();
        return view('frontend.chinh_sach_van_chuyen', compact('categories', 'brands', 'topics'));
    }

    public function chinhSachDoiTra()
    {
        $brands = Brand::where('status', 1)->get();
        $topics = Topic::where('status', 1)->get();
        $categories = Category::where('status', 1)->get();
        return view('frontend.chinh_sach_doi_tra', compact('categories', 'brands', 'topics'));
    }
}
