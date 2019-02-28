<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Brand;
use Illuminate\Support\Facades\Storage;
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
      //file uploade
      $logo_path = $request->file('logo_picture')->store('public/logo_pictures');
      $profile_path = $request->file('profile_picture')->store('public/profile_pictures');

      $brand = new Brand;
      $brand->brand_name = $request->brand_name;
      //change file path for show picture
      $brand->logo_picture = str_replace("public", "storage", $logo_path);
      $brand->profile_picture = str_replace("public", "storage", $profile_path);
      $brand->brand_introduction = $request->brand_introduction;
      $brand->home_page = $request->home_page;
      $brand->save();

      return redirect(route("admin_get_brand_index"));
    }
  }

    public function index(Request $request){
        $brands = Brand::all();
        return view("admin.brand.index", ["brands" => $brands]);
    }
    public function edit(Request $request, $id)

  {
    if($request->isMethod("GET")) {
      $brand = Brand::where('id',$id) ->first();

      return view("admin.brand.edit", ['brand' => $brand]);

    } else {


      $brand = Brand::find($request->brand_id);
      $brand->brand_name = $request->brand_name;
      $brand->logo_picture = $request->logo_picture;
      $brand->profile_picture = $request->profile_picture;
      $brand->brand_introduction = $request->brand_introduction;
      $brand->home_page = $request->home_page;
      $brand->save();


      return redirect(route("admin_get_brand_index"));
    }
  }
  public function delete(Request $request, $id)

  {
  if($request->isMethod("GET")) {
    $brand = Brand::where('id',$id) ->first();

    return view("admin.brand.delete", ['brand' => $brand]);

  } else {
    $brand = Brand::find($request->brand_id)->delete();
    return redirect(route("admin_get_brand_index"));
  }
  }
}
