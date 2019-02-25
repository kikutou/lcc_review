<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Master\Country;
use Validator;

class CountryController extends Controller
{

  public function add(Request $request){

    if($request->isMethod("GET")) {
      return view("admin.country.add");
    } else {

      $validator = Validator::make($request->all(), Country::$validation_rules, Country::$validation_messages);
      if($validator->fails()) {
        return redirect(route("admin_get_country_add"))->withErrors($validator)->withInput();
      }

      $country = new Country;
      $country->value = $request->value;
      $country->rank = $request->rank;
      $country->save();

      return redirect(route("admin_get_country_index"));
    }


  }
  public function index(Request $request){

    $countries = Country::all();

    return view("admin.country.index", ["countries" => $countries]);
  }

  //edit
  public function edit(Request $request, $id){

    if ($request->isMethod("GET")) {
      $country = Country::where('id', $id) -> first();
      return view('admin.country.edit', ['country' => $country]);

    }else{
      $validator = Validator::make($request->all(), Country::$validation_rules, Country::$validation_messages);
      if($validator->fails()) {
        return redirect(route("admin_get_country_edit"),['id' => $request->id])->withErrors($validator)->withInput();
      }
      $country = Country::find($request->country_id);
      $country->value = $request->value;
      $country->rank = $request->rank;
      $country->save();

      return redirect(route("admin_get_country_index"));
    }
  }

//delete
  public function delete(Request $request, $id){
    if ($request->isMethod("GET")) {

      $country = Country::where('id', $id) -> first();
      return view('admin.country.delete',['country' => $country]);

    }else {

      $country = Country::find($request->country_id)->delete();
      return redirect(route("admin_get_country_index"));
    }
  }


}
