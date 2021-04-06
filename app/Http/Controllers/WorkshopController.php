<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Workshop;

class WorkshopController extends Controller
{
    public function index(Request $request)
    {
        $workshop = \App\Models\Workshop::all();
        return view('admin.workshop.index', compact("workshop"));
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
        return redirect('/workshop')->with('sukses', 'Data berhasil ditambah');
    }
    public function delete(Workshop $workshop)
    {
        $workshop->delete($workshop);
        return redirect('/workshop')->with('hapus', 'Data berhasil dihapus');
    }
    public function edit($id)
    {
        // $this->validate(
        //     $request,
        //     [
        //         'kode' => 'required',
        //         'nama' => 'required',
        //         'deskripsi' => 'required',
        //         'harga' => 'required',
        //         'tanggal_pelaksanaan' => 'required',
        //         'jumlah_peserta' => 'required',
        //         'poster' => 'mimes:jpg,png'
        //     ]
        // );

        $workshop = Workshop::find($id);
        return view('admin.workshop.edit', ['workshop'=>$workshop]);
    }
    public function update(Request $request, $id)
    {
        // $workshop->update($request->all());
        // if ($request->hasFile('avatar')) {
        //     $request->file('avatar')->move('images/', $request->file('avatar')->getClientOriginalName());
        //     $peserta->avatar = $request->file('avatar')->getClientOriginalName();
        //     $peserta->save();
        // }
        $workshop = Workshop::find($id);
        $workshop->kode = $request->input('kode');
        $workshop->nama = $request->input('nama');
        $workshop->deskripsi = $request->input('deskripsi');
        $workshop->harga = $request->input('harga');
        $workshop->tanggal_pelaksanaan = $request->input('tanggal_pelaksanaan');
        $workshop->jumlah_peserta = $request->input('jumlah_peserta');
        $workshop->update();
        return redirect('/workshop')->with('sukses', 'Data berhasil diupdate');
    }
    
}
