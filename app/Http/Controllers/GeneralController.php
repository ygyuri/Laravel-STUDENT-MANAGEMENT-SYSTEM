<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GeneralController extends Controller
{
    public function index()
    {
        return view('general.index'); //  blade file is named index.blade.php and is located in the views/general directory
    }
}
