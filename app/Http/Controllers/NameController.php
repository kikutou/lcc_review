<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NameController extends Controller
{
    public function form(){
      return view('name/name_test');
    }

    public function result(){
      return view('name/name_test_result',
      ['name'=> $name]);
    }

}
