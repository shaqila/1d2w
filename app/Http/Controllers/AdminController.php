<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class AdminController extends Controller
{
    public function dashboard()
    {
        $user = Auth::user();
        return view('admin.dashboard');
    }
    
}
