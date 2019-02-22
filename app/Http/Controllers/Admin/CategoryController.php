<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Master\Category;
use Validator;

class CategoryController extends Controller
{
  public function add(Request $request){

    if($request->isMethod("GET")) {
      return view("admin.category.add");
    } else {

      $validator = Validator::make($request->all(), Category::$validation_rules, Category::$validation_messages);
      if($validator->fails()) {
        return redirect(route("admin_get_category_add"))->withErrors($validator)->withInput();
      }

      $categories = new Category;
      $categories->category = $request->category;
      $categories->category_introduction = $request->category_introduction;
      $categories->save();

      return redirect(route("admin_get_category_index"));
    }
  }

  public function index(Request $request){

    $categories = Category::all();

    return view("admin.category.index", ["categories" => $categories]);
  }

}
