<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WorkshopController extends Controller
{
    public function readon()
    {
        return view('layouts.pages.workshop-details');
    }
}
