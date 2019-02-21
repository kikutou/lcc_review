<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AirportController.php extends Controller
{
    //
    public function add(Request $request)
    {
        return view("admin.airport.add");
    }

    public function index(Request $request)
      {
          return view("admin.airport.index");
      }
}
