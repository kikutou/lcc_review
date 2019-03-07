<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use App\Model\Brand;
use App\Model\Master\Airport;
use App\Model\Flight;



class FlightController extends Controller
{
    //
    public function add(Request $request){

      if($request->isMethod("GET")) {
        $brands = Brand::all();
        $airports = Airport::all();

        return view("admin.flight.add",['brands'=>$brands,'airports'=>$airports,]);
      } else {

         // $validator = Validator::make($request->all(), Flight::$validation_rules, Flight::$validation_messages);
         // if($validator->fails()) {
         //   return redirect(route("admin_get_flight_add"))->withErrors($validator)->withInput();
         }

        $flight = new Flight;
        $flight->brand_id = $request->brand_id;
        $flight->flight_number = $request->flight_number;
        $flight->mtb_start_airport_id = $request->mtb_start_airport_id;
        $flight->mtb_destination_airport_id = $request->mtb_destination_airport_id;
        $flight->start_time = $request->start_time;
        $flight->destination_time = $request->destination_time;
        $flight->save();
        return redirect(route("admin_get_flight_index"));
        //return redirect(route("admin_get_flight_index"));
      }


    public function index(Request $request){
        $flights = Flight::all();
        return view("admin.flight.index", ["flights" => $flights]);

    }


  //   public function edit(Request $request, $id)
  // {
  // if($request->isMethod("GET")) {
  //   $flight = Flight::where('id',$id) ->first();
  //   $brands = Brand::all();
  //   $airports = Airport::all();
  //
  //   return view("admin.flight.edit", ['flight' => $flight]);
  //
  // } else {
  //
  //   $flight = Flight::find($request->flight_id);
  //   $flight->brand_id = $request->brand_id;
  //   $flight->flight_number = $request->flight_number;
  //   $fight->mtb_start_airport_id = $request->mtb_start_airport_id;
  //   $fight->mtb_destination_airport_idd = $request->mtb_destination_airport_id;
  //   $flight->start_time = $request->start_time;
  //   $flight->destination_time = $request->destination_time;
  //   $flight->save();
  //
  //   return redirect(route("admin_get_flight_index"));
  // }
  // }




}
