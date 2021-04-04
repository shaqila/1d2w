<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Workshop;
use App\Models\Karya;

class HomeController extends Controller
{
    public function index()
    {
        $workshop = Workshop::all();
        
        return view('layouts.pages.home', compact("workshop"));
    }
   public function detail_creation($id)
    {
        $karya = Karya::where('id',$id)->first();
       
        return view('layouts.pages.creation-details', compact("karya"));
    }

    public function getDownload(){
        $file = public_path()."/pdf-workshop/karya01.pdf";
        $headers = array(
            'Content-type : application/pdf',
        );

        return response()->download($file, 'file.pdf', $headers);
    }
}
