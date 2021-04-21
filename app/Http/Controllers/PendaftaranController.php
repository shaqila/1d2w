<?php

namespace App\Http\Controllers;

use App\Models\Pendaftaran;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Peserta;
use App\Models\PesertaWorkshop;
use App\Models\Province;
use App\Models\Workshop;
use Illuminate\Support\Facades\Auth;

class PendaftaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        if (!Auth::user()) return redirect('login')->with('sukses', 'Harap Daftar Terlebih Dahulu');
        $user = User::get();
        $workshop = Workshop::where('id', $id)->first();
        $province = Province::all();
        return view('peserta.pendaftaran', compact("user", "workshop", 'province'));
    }

    // public function detail_pendaftaran($id)
    // {
    //     $workshop = Workshop::with('peserta')->where('id', $id)->first();
    //     $province = Province::all();
    //     return view('peserta.pendaftaran', compact("workshop", 'province'));
    // }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create_proses(Request $request)
    {

        $peserta = new Peserta();
        $peserta->nama_lengkap = $request->nama_lengkap;
        $peserta->jenis_kelamin = $request->jenis_kelamin;
        $peserta->user_id = Auth::user()->id;
        $peserta->profesi = $request->profesi;
        $peserta->province_id = $request->province_id;
        $peserta->no_hp = $request->no_hp;
        $peserta->workshop_id = $request->workshop_id;
        $peserta->save();

        $user= User::findOrFail($peserta->user_id);
        if($user->province_id==0){
            $user->province_id=$peserta->province_id;
        }
        if($user->profesi==null){
            $user->profesi=$peserta->profesi;
        }
        if($user->jenis_kelamin==null){
            $user->jenis_kelamin=$peserta->jenis_kelamin;
        }
        if($user->no_hp==null){
            $user->no_hp=$peserta->no_hp;
        }
        $user->update();
        return view('peserta.complete-pendaftaran');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pendaftaran  $pendaftaran
     * @return \Illuminate\Http\Response
     */
    public function show(Pendaftaran $pendaftaran)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pendaftaran  $pendaftaran
     * @return \Illuminate\Http\Response
     */
    public function edit(Pendaftaran $pendaftaran)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pendaftaran  $pendaftaran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pendaftaran $pendaftaran)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pendaftaran  $pendaftaran
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pendaftaran $pendaftaran)
    {
        //
    }
}
