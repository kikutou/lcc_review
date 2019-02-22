<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Master\Country;
use App\Model\Master\City;


class CityController extends Controller
{
  public function add(Request $request){
    $country = Country::all();

    if ($request->isMethod("GET")) {
      return view("admin.city.add",['countries'=>$country]);
    }else{
      $city = new City;
      $city->mtb_country_id = $request->country;
      $city->value = $request->value;
      $city->rank = $request->rank;
      $city->save();

      return redirect(route("admin_get_city_index"));
    }


  }
  public function index(Request $request){
    $citiess = City::all();

    return view("admin.city.index");
  }
}
