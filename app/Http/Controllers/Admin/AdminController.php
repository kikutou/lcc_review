<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin;
use Validator;


class AdminController extends Controller
{
  public function add(Request $request){

    if($request->isMethod("GET")) {
      return view("admin.admin.add");
    } else {

      $validator = Validator::make($request->all(), Admin::$validation_rules, Admin::$validation_messages);
      if($validator->fails()) {
        return redirect(route("admin_get_admin_add"))->withErrors($validator)->withInput();
      }

      $admin = new Admin;
      $admin->admin_user = $request->admin_user;
      $admin->setPassword($request->password);
      $admin->save();

      return redirect(route("admin_get_admin_index"));
    }
  }
  //index
  public function index(Request $request){

    $admins = Admin::all();

    return view("admin.admin.index", ["admins" => $admins]);
  }

  //edit
  public function edit(Request $request, $id)
  {
    if($request->isMethod("GET")) {
      $admin = Admin::where('id',$id) ->first();
      return view("admin.admin.edit", ['admin' => $admin]);

    } else {
      $admin = Admin::find($request->admin_id);

      //Validator
      if ($admin->admin_user != $request->admin_user) {
        $validator = Validator::make($request->all(), Admin::$validation_rules_for_edit, Admin::$validation_messages_for_edit);
        if($validator->fails()) {
          return redirect(route("admin_get_admin_edit", ['id' => $request->id]))->withErrors($validator)->withInput();
        }
      }


      $admin->admin_user = $request->admin_user;
      $admin->save();
      return redirect(route("admin_get_admin_index"));
    }
  }

  //delete
  public function delete(Request $request, $id)

  {
    if($request->isMethod("GET")) {
      $admin = Admin::where('id',$id) ->first();

      return view("admin.admin.delete", ['admin' => $admin]);

    } else {
      $admin = Admin::find($request->admin_id);
      $admin->delete();
      return redirect(route("admin_get_admin_index"));
    }
  }


}
