<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function add(Request $request)
    {
        return view("admin.category.add");
    }

    public function index(Request $request)
    {
        return view("admin.category.index");
    }
}
