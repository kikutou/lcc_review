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

      $category = new Category;
      $category->category_name = $request->category_name;
      $category->category_introduction = $request->category_introduction;
      $category->save();

      return redirect(route("admin_get_category_index"));
    }
  }


  public function index(Request $request){

    $categories = Category::all();

    return view("admin.category.index", ["categories" => $categories]);
  }

    public function edit(Request $request, $id)

  {
    if($request->isMethod("GET")) {
      $category = Category::where('id',$id) ->first();

      return view("admin.category.edit", ['category' => $category]);

    } else {


      $category = Category::find($request->category_id);
      $category->category_name = $request->category_name;
      $category->category_introduction = $request->category_introduction;
      $category->save();


      return redirect(route("admin_get_category_index"));
    }
  }
  public function delete(Request $request, $id)

  {
  if($request->isMethod("GET")) {
    $category = Category::where('id',$id) ->first();

    return view("admin.category.delete", ['category' => $category]);

  } else {
    $category = Category::find($request->category_id)->delete();
    return redirect(route("admin_get_category_index"));
  }
  }
}
