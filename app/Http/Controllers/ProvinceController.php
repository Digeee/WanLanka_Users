<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProvinceController extends Controller
{
    public function index()
    {
        return view('provinces'); // Must match provinces.blade.php file
    }
}
