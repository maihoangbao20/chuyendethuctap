<?php

namespace App\Http\Controllers\components;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PolicyController extends Controller
{
    public function about()
    {
        return view('components.about');
    }

    public function privacyPolicy()
    {
        return view('components.privacy-policy');
    }

    public function terms()
    {
        return view('components.terms');
    }

    public function paymentPolicy()
    {
        return view('components.payment-policy');
    }

    public function shippingPolicy()
    {
        return view('components.shipping-policy');
    }

    public function returnPolicy()
    {
        return view('components.return-policy');
    }
}