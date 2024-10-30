<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Province;
use App\Models\District;
use App\Models\Ward;

class AddressController extends Controller
{
    public function showCheckoutForm()
    {
        $provinces = Province::all(); // Hoặc lấy dữ liệu từ API
        return view('checkout', ['provinces' => $provinces]);
    }

    public function getProvinces()
    {
        $provinces = Province::all();
        return response()->json($provinces);
    }

    public function getDistricts($provinceId)
    {
        $districts = District::where('province_id', $provinceId)->get();
        return response()->json($districts);
    }

    public function getWards($districtId)
    {
        $wards = Ward::where('district_id', $districtId)->get();
        return response()->json($wards);
    }
}
