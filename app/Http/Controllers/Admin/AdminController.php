<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin;
use Auth;
use Validator;
use Illuminate\Support\Facades\Hash;


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
      $admin->token = str_random(20);
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

  //login
   public function login(Request $request){

     if($request->isMethod("get"))
     {
       return view('admin.admin.login');
     } else{

       if(Auth::guard("admin")->attempt(["admin_user" => $request->admin_user, "password" => $request->password]) ) {
         return redirect()->route("admin_get_admin_index");
       } else {
         return redirect()->back();
       }
     }
    }

    public function logout(Request $request)
    {
      Auth::guard("admin")->logout();
      return redirect()->route("admin_get_admin_login");
    }



    // public function verify(Request $request,$token)
    // {
    //   $admin = Admin::where('token',$token)->first();
    //   if($admin)
    //   {
    //     $admin->
    //     $admin->
    //     $admin->save();
    //
    //     return view("admin.admin.verify");
    //   }else
    //   {
    //     return redirect(route("admin_get_admin_login"))->with(["message" => '会員認証が失敗しました']);
    //   }
    // }



}
