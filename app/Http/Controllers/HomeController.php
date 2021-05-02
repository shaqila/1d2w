<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Workshop;
use App\Models\Karya;
use App\Models\Peserta;
use App\Models\Province;
use Illuminate\Support\Carbon;

class HomeController extends Controller
{

    public function index()
    {
        $workshop = Workshop::where('tanggal_pelaksanaan', '>', Carbon::now())->get();
        // $karya = Karya::orderBy('created_at', 'DESC')->get();
        return view('layouts.pages.home', compact("workshop"));
    }
    public function detail_workshop($id)
    {
        $workshop = Workshop::where('slug', $id)->first();
        return view('layouts.pages.workshop-details', compact("workshop"));
    }
    public function detail_creation($id)
    {
        $karya = Karya::where('slug', $id)->first();
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

    public function peserta_setting()
    {
        return view('peserta.peserta-setting');
    }
    public function about()
    {
        return view('layouts.pages.about');
    }
    public function page_karya()
    {
        $karya = Karya::orderBy('created_at', 'DESC')->get();
        return view('layouts.pages.karya', compact("karya"));
    }
}
