<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Karya;

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
                $request->file('cover')->move('cover-karya/', $request->file('cover')->getClientOriginalName());
                $karya->cover = $request->file('cover')->getClientOriginalName();
                $karya->save();
            }
            // if ($request->hasFile('pdf')) {
            //     $request->file('pdf')->move('cover-karya/', $request->file('pdf')->getClientOriginalName());
            //     $karya->pdf = $request->file('pdf')->getClientOriginalName();
            //     $karya->save();
            // }
        // \Session::flash('flash_message', 'A new course has been created!');
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
        return view('admin.creation.edit', ['karya'=>$karya]);
    }
    public function update(Request $request, $id)
    {
        // $workshop->update($request->all());
        // if ($request->hasFile('avatar')) {
        //     $request->file('avatar')->move('images/', $request->file('avatar')->getClientOriginalName());
        //     $peserta->avatar = $request->file('avatar')->getClientOriginalName();
        //     $peserta->save();
        // }
        $karya = Karya::find($id);
        $karya->nama_karya = $request->input('nama_karya');
        $karya->deskripsi = $request->input('deskripsi');
        $karya->update();
        return redirect('/creation')->with('sukses', 'Data berhasil diupdate');
    }
    public function delete(Karya $karya)
    {
        $karya->delete($karya);
        return redirect('/creation')->with('hapus', 'Data berhasil dihapus');
    }
    public function getDownload()
    {
        $file = public_path()."/pdf-workshop/karya01.pdf";
        $headers = array(
            'Content-type : application/pdf',
        );

        return response()->download($file, 'file.pdf', $headers);
    }
    
}
