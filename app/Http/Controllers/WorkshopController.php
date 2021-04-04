<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WorkshopController extends Controller
{
    public function index(Request $request)
    {
        $data_workshop = \App\Models\Workshop::all();
        return view('admin.workshop.index', ['data_workshop'=>$data_workshop]);
    }
    public function create(Request $request)
    {
        $this->validate(
            $request,
            [
                'kode' => 'required',
                'nama' => 'required',
                'deskripsi' => 'required',
                'harga' => 'required',
                'tanggal_pelaksanaan' => 'required',
                'jumlah_peserta' => 'required',
                'poster' => 'mimes:jpg,png'
            ]
        );
        //Insert ke Table Workshop
        $workshop = \App\Models\Workshop::create($request->all());
            if ($request->hasFile('poster')) {
                $request->file('poster')->move('img-workshop/', $request->file('poster')->getClientOriginalName());
                $workshop->poster = $request->file('poster')->getClientOriginalName();
                $workshop->save();
            }
        // \Session::flash('flash_message', 'A new course has been created!');
        return redirect('/workshop')->with('sukses', 'Data berhasil diupdate');
    }
    
}
