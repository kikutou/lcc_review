<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NewbrandsCotroller extends Controller
{
    //
    public function Newbrands(Request $request)
    {

        return view("admin.brands.Newbrands");
    }
}
