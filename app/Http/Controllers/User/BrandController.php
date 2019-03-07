<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Brand;
use App\Model\Flight;
use Illuminate\Support\Facades\Storage;




class BrandController extends Controller
{


    public function index(Request $request){

        $brands = Brand::query();
        if($request->key_word) {

          $key_word = $request->key_word;

          $brands->where("brand_name", "LIKE", '%'.$key_word.'%');
        }

        // $start_id = Flight::find($brand->mtb_start_airport_id);
        // $dstination_id = Flight::find($brand->mtb_destination_airport_id);

        $brands = Brand::all();
        return view("user.brand.index", ['brands' => $brands]);
    }


    public function detail(Request $request, $id){

      $brand = Brand::where('id',$id)->first();
      return view("user.brand.detail",['brand' => $brand]);
    }
  }
