<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CityController extends Controller
{
  public function add(Request $request){

    return view("admin.city.add");
  }
  public function index(Request $request){

    return view("admin.city.index");
  }
}
