<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peserta;

class PesertaController extends Controller
{
    public function index(Request $request)
    {
        $peserta = Peserta::all();
        return view ('admin.peserta.index', compact("peserta"));
    }
    public function create(Request $request)
    {
        $this->validate(
            $request,
            [
                'nama_lengkap' => 'required',
                'jenis_kelamin' => 'required',
                'profesi' => 'required',
                'domisili' => 'required',
                'no_hp' => 'required',
            ]
        );
        $peserta = Peserta::create($request->all());
        if ($request->hasFile('avatar')) {
            $request->file('avatar')->move('img-peserta/', $request->file('avatar')->getClientOriginalName());
            $peserta->avatar = $request->file('avatar')->getClientOriginalName();
            $peserta->save();
        }
        // \Session::flash('flash_message', 'A new course has been created!');
        return redirect('/peserta')->with('sukses', 'Data berhasil diupdate');
    }
    public function delete(Peserta $peserta)
    {
        $peserta->delete($peserta);
        return redirect('/peserta')->with('hapus', 'Data berhasil dihapus');
    }
    public function edit($id)
    {
        $peserta = Peserta::find($id);
        return view('admin.peserta.edit', ['peserta'=>$peserta]);
    }
    public function update(Request $request, $id)
    {
        $peserta = Peserta::find($id);
        $peserta->update($request->all());
        if ($request->hasFile('avatar')) {
            $request->file('avatar')->move('img-avatar/', $request->file('avatar')->getClientOriginalName());
            $peserta->avatar = $request->file('avatar')->getClientOriginalName();
            $peserta->update();
        }

        return redirect('/peserta')->with('sukses', 'Data berhasil diupdate');
    }
}
