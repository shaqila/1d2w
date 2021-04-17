<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Workshop;
use App\Models\Karya;
use App\Models\Peserta;

class HomeController extends Controller
{
    public function index()
    {
        $workshop = Workshop::all();
        $karya = Karya::all();
        return view('layouts.pages.home', compact("workshop", "karya"));
    }
    public function detail_workshop($id)
    {
        $workshop = Workshop::where('id', $id)->first();
        return view('layouts.pages.workshop-details', compact("workshop"));
    }
    public function detail_creation($id)
    {
        $karya = Karya::findOrfail($id);
        return view('layouts.pages.creation-details', compact("karya"));
    }

    public function getDownload($karya)
    {
        $file = public_path() . "/pdf-workshop/$karya";
        $headers = array(
            'Content-type : application/pdf',
        );

        return response()->download($file, 'file.pdf', $headers);
    }
    public function detail_pendaftaran()
    {
        // $peserta = Peserta::where('id',$id)->first();
        // $peserta = Peserta::find($id);
        return view('peserta.pendaftaran');
    }
    public function dashboard()
    {
        $workshop = Workshop::all();
        $karya = Karya::all();
        return view('peserta.dashboard-peserta', compact("workshop", "karya"));
    }
}
