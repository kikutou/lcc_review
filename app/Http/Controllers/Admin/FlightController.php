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
        return view("admin.flight.add",['brands'=>$brands,'airports'=>$airports]);
      } else {

         $validator = Validator::make($request->all(), Flight::$validation_rules, Flight::$validation_messages);
         if($validator->fails()) {
           return redirect(route("admin_get_flight_add"))->withErrors($validator)->withInput();
         }

        $flight = new Flight;
        $flight->brand_id= $request->brand_id;
        $flight->flight_number = $request->flight_number;
        $flight->mtb_start_airport_id = $request->mtb_start_airport_id;
        $flight->mtb_destination_airport_id = $request->mtb_destination_airport_id;
        $flight->start_time = $request->start_time;
        $flight->destination_time = $request->destination_time;


        $flight->save();
        return view("admin.flight.index");
        //return redirect(route("admin_get_flight_index"));
      }
    }

    public function index(Request $request){
        $flights = Flight::all();
  //出发机场的id在$start_flight_result
        $start_flight_result = array();
        foreach($flights as $flight){
          $start_flight_result[] = $flight->mtb_start_airport_id;
        }

        $start_flight = Airport::whereIN('id',$start_flight_result)
        ->get();
//到达机场的id在$end_flight_result
        $end_flight_result = array();
        foreach($flights as $flight){
          $end_flight_result[] = $flight->mtb_destination_airport_id;
        }

        $end_flight = Airport::whereIN('id',$end_flight_result)
        ->get();
        dd($start_flight);

        return view("admin.flight.index", ["flights" => $flights,"start_flight" => $start_flight,"end_flight" => $end_flight]);
    }


}
