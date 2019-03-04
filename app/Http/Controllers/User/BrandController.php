<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Brand;
use Illuminate\Support\Facades\Storage;




class BrandController extends Controller
{
    public function index(Request $request){
        $brands = Brand::paginate();
        return view("user.brand.index", ["brands" => $brands]);
    }
  }
