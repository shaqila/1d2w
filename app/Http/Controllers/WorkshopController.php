<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Workshop;
use App\Http\Requests\WorkshopRequest;
use Intervention\Image\Facades\Image;

class WorkshopController extends Controller
{
    public function index(Request $request)
    {
        $workshop = Workshop::with('peserta')->get();
        return view('admin.workshop.index', compact("workshop"));
    }
    public function create(WorkshopRequest $request)
    {
        //Insert ke Table Workshop
        $workshop = Workshop::create($request->all());
        if ($request->hasFile('poster')) {
            $image = $request->file('poster');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $size = Image::make($image);
            $size->resize(570, 721)->encode('png')->save(public_path('/img-workshop/' . $filename));
            $workshop->poster = $filename;
        } else {
            $workshop->poster = 'workshop.jpg';
        }
        $workshop->save();
        // \Session::flash('flash_message', 'A new course has been created!');
        return redirect()->route('workshop')->with('sukses', 'Data berhasil ditambah');
    }
    public function delete($id)
    {
        $workshop = Workshop::findOrFail($id);
        $workshop->delete();
        return redirect()->route('workshop')->with('hapus', 'Data berhasil dihapus');
    }
    public function edit($id)
    {
        $workshop = Workshop::find($id);
        return view('admin.workshop.edit', compact("workshop"));
    }

    public function workshop_detail($id)
    {
        $workshop = Workshop::with('peserta')->where('id', $id)->first();
        // dd($workshop);
        return view('admin.workshop.detail', compact('workshop'));
    }

    public function update(WorkshopRequest $request, $id)
    {
        // $workshop->update($request->all());
        // if ($request->hasFile('avatar')) {
        //     $request->file('avatar')->move('images/', $request->file('avatar')->getClientOriginalName());
        //     $peserta->avatar = $request->file('avatar')->getClientOriginalName();
        //     $peserta->save();
        // }
        $workshop = Workshop::findOrFail($id);
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
