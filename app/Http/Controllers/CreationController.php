<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CreationController extends Controller
{
    public function index()
    {
        return view('layouts.pages.creation');
    }
    public function create()
    {
        # code...
    }
    public function edit()
    {
        # code...
    }
    public function update()
    {
        # code...
    }
    public function delete()
    {
        # code...
    }
    public function readon()
    {
        return view('layouts.pages.creation-details');
    }
}
