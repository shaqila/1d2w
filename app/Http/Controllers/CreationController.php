<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Karya;
use Carbon\Carbon;
use Intervention\Image\Facades\Image;

class CreationController extends Controller
{
    public function index()
    {
        $karya = Karya::all();
        return view('admin.creation.index', compact("karya"));
    }
    public function create(Request $request)
    {
        $this->validate(
            $request,
            [
                'nama_karya' => 'required',
                'deskripsi' => 'required',
                'cover' => 'mimes:jpg,png',
                'pdf' => 'mimes:pdf'
            ]
        );
        //Insert ke Table Karya
        $karya = Karya::create($request->all());
        if ($request->hasFile('cover')) {
            $image = $request->file('cover');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $size = Image::make($image);
            $size->resize(570, 721)->encode('png')->save(public_path('/cover-karya/' . $filename));
            $karya->cover = $filename;
        } else {
            $karya->cover = 'cover01.jpg';
        }
        if ($request->hasFile('pdf')) {
            $pdf = $request->file('pdf');
            $filename = time() . '.' . $pdf->getClientOriginalExtension();
            $request->file('pdf')->move('pdf-workshop/', $filename);
            $karya->pdf = $filename;
        }
        $karya->save();
        return redirect('/creation')->with('sukses', 'Data berhasil ditambah');
    }
    public function edit($id)
    {
        // $this->validate(
        //     $request,
        //     [
        //         'nama_karya' => 'required',
        //         'deskripsi' => 'required',
        //         'cover' => 'mimes:jpg,png',
        //         'pdf' => 'mimes:pdf'
        //     ]
        // );

        $karya = Karya::find($id);
        return view('admin.creation.edit', ['karya' => $karya]);
    }
    public function update(Request $request, $id)
    {
        $karya = Karya::find($id);
        $karya->nama_karya = $request->input('nama_karya');
        $karya->deskripsi = $request->input('deskripsi');
        $karya->update();
        return redirect('/creation')->with('sukses', 'Data berhasil diupdate');
    }
    public function delete($karya)
    {
        $karya = Karya::where('id', $karya)->first();
        $image_path = public_path() . '/cover-karya/' . $karya->cover;
        $pdf_path = public_path() . '/pdf-workshop/' . $karya->pdf;
        unlink($image_path);
        unlink($pdf_path);
        $karya->delete();
        return redirect('/creation')->with('hapus', 'Data berhasil dihapus');
    }
    public function getDownload($name)
    {
        $file = public_path() . "/pdf-workshop/" . $name;
        $headers = array(
            'Content-type : application/pdf',
        );
        $format_nama = Carbon::now() . $name;
        return response()->download($file, $format_nama, $headers);
    }
}
