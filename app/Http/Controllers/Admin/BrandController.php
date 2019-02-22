<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Master\Brand;
use Validator;
class BrandController extends Controller
{
  public function add(Request $request){

    if($request->isMethod("GET")) {
      return view("admin.brand.add");
    } else {

      $validator = Validator::make($request->all(), Brand::$validation_rules, Brand::$validation_messages);
      if($validator->fails()) {
        return redirect(route("admin_get_brand_add"))->withErrors($validator)->withInput();
      }

      $categories = new Brand;
      $categories->brand_name = $request->brand_name;
      $categories->logo_picture = $request->logo_picture;
      $categories->profile_picture = $request->profile_picture;
      $categories->brand_introduction = $request->brand_introduction;
      $categories->home_page = $request->home_page;
      $categories->save();

      return redirect(route("admin_get_brand_index"));
    }
  }








    public function index(Request $request)
    {
        return view("admin.brand.index");
    }
}
