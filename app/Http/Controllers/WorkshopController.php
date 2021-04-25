<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Workshop;
use App\Http\Requests\WorkshopRequest;
use App\Models\Peserta;
use Intervention\Image\Facades\Image;

class WorkshopController extends Controller
{
    public function index(Request $request)
    {
        $workshop = Workshop::orderBy('tanggal_pelaksanaan', 'desc')->get();;
        return view('admin.workshop.index', compact("workshop"));
    }
    public function create(WorkshopRequest $request)
    {
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
        return redirect()->route('workshop')->with('success', 'Data berhasil ditambah');
    }
    public function delete($workshop)
    {
        $workshop = Workshop::where('id', $workshop)->first();
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
        $workshop = Workshop::with(['peserta' => function ($query) {
        }])->where('id', $id)->first();

        return view('admin.workshop.detail', compact('workshop'));
    }

    public function update(WorkshopRequest $request, $id)
    {
        $request->id = $id;
        $workshop = Workshop::findOrFail($id);
        $workshop->kode = $request->kode;
        $workshop->nama = $request->nama;
        $workshop->deskripsi = $request->deskripsi;
        $workshop->harga = $request->harga;
        $workshop->tanggal_pelaksanaan = $request->tanggal_pelaksanaan;
        $workshop->batas_pendaftaran = $request->batas_pendaftaran;
        $workshop->jam_pelaksanaan = $request->jam_pelaksanaan;
        $workshop->jumlah_peserta = $request->jumlah_peserta;
        if ($request->hasFile('poster')) {
            $image = $request->file('poster');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $size = Image::make($image);
            $size->resize(570, 721)->encode('png')->save(public_path('/img-workshop/' . $filename));
            $workshop->poster = $filename;
        }
        $workshop->save();
        return redirect('/workshop')->with('sukses', 'Data berhasil diupdate');
    }
}
