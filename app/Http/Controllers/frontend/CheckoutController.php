<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Province;
use App\Models\District;
use App\Models\Ward;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $addresses = $user ? $user->addresses : collect();

        // Lấy danh sách tỉnh/thành phố
        $provinces = Province::all();

        return view('checkout', compact('addresses', 'provinces'));
    }

    public function getDistricts(Request $request)
    {
        $provinceId = $request->input('province_id');
        $districts = District::where('province_id', $provinceId)->get();
        return response()->json($districts);
    }

    public function getWards(Request $request)
    {
        $districtId = $request->input('district_id');
        $wards = Ward::where('district_id', $districtId)->get();
        return response()->json($wards);
    }

    public function addAddress(Request $request)
    {
        $request->validate([
            'province_id' => 'required',
            'district_id' => 'required',
            'ward_id' => 'required',
            'street' => 'required',
            'specific' => 'nullable',
        ]);

        $address = new Address();
        $address->user_id = auth()->id();
        $address->province_id = $request->province_id;
        $address->district_id = $request->district_id;
        $address->ward_id = $request->ward_id;
        $address->street = $request->street;
        $address->specific = $request->specific;
        $address->save();

        return redirect()->back();
    }
}