<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CountryController extends Controller
{
  public function add(Request $request){

    return view("admin.country.add");
  }
  public function index(Request $request){

    return view("admin.country.index");
  }
}
