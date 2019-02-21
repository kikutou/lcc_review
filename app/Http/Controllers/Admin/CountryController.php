<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Master\Country;

class CountryController extends Controller
{
  public function add(Request $request){

    if($request->isMethod("GET")) {
      return view("admin.country.add");
    } else {
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
}
