<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Master\Country;
use App\Model\Master\City;


class CityController extends Controller
{
  public function add(Request $request){

    if ($request->isMethod("GET")) {
      $countries = Country::all();
      return view("admin.city.add",['countries'=>$countries]);
    }else{
      $city = new City;
      $city->mtb_country_id = $request->mtb_country_id;
      $city->value = $request->value;
      $city->rank = $request->rank;
      $city->save();

      return redirect(route("admin_get_city_index"));
    }


  }
  public function index(Request $request){
    $cities = City::paginate(config("parameters.admin.pagination_per_page"));

    return view("admin.city.index",["cities" => $cities]);
  }
}
