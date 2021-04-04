<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Workshop;

class HomeController extends Controller
{
    public function index()
    {
        $workshop = Workshop::all();
        
        return view('layouts.pages.home', compact("workshop"));
    }
   
}
