<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BrandController extends Controller
{
    public function add(Request $request)
    {
        return view("admin.brand.add");
    }
    public function index(Request $request)
    {
        return view("admin.brand.index");
    }
}
