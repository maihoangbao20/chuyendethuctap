<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
class ImportantController extends Controller
{
    public function index()
    {
        return view('backend.important.index');
    }
}
