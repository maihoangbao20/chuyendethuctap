<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
class InformationController extends Controller
{
    public function index()
    {
        return view('backend.information.index');
    }
}
