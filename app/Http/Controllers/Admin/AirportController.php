<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Master\Airport;
use App\Model\Master\City;
use App\Model\Flight;
use Validator;

class AirportController extends Controller
{
  public function add(Request $request){

    if ($request->isMethod("GET")) {
      $cities = City::all();
      return view("admin.airport.add",['cities'=>$cities]);
    } else {

      $validator = Validator::make($request->all(), Airport::$validation_rules, Airport::$validation_messages);
      if($validator->fails()) {
        return redirect(route("admin_get_airport_add"))->withErrors($validator)->withInput();
      }

      $airport = new Airport;
      $airport->airport_name = $request->airport_name;
      $airport->mtb_city_id = $request->mtb_city_id;
      $airport->save();

      return redirect(route("admin_get_airport_index"));
    }
  }

    public function index(Request $request){
        $airports = Airport::paginate(config("parameters.admin.pagination_per_page"));
        return view("admin.airport.index", ["airports" => $airports]);
    }

      public function edit(Request $request, $id)
    {
    if($request->isMethod("GET")) {
      $airport = Airport::where('id',$id) ->first();

      return view("admin.airport.edit", ['airport' => $airport]);

    } else {
      $airport = Airport::find($request->airport_id);
      $airport->airport_name  = $request->airport_name;
      //$airport->mtb_city_id = $request->mtb_city_id ;
      $airport->save();
      return redirect(route("admin_get_airport_index"));
    }
  }

  public function delete(Request $request, $id)

  {
  if($request->isMethod("GET")) {
    $airport= Airport::where('id',$id) ->first();

    return view("admin.airport.delete", ['airport' => $airport]);

  } else {
    $airport = Airport::find($request->airport_id)->delete();
    return redirect(route("admin_get_airport_index"));
  }
  }



}
