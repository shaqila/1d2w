<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peserta;
use App\Models\User;
use App\Http\Requests\PesertaRequest;

class PesertaController extends Controller
{
    public function index(Request $request)
    {
        $peserta = Peserta::all();
        return view('admin.peserta.index', compact("peserta"));
    }
    public function create(PesertaRequest $request)
    {

        //Insert ke Table User
        $user = new User();
        $user->name = $request->nama_lengkap;
        $user->email = $request->email;
        $user->role = 'peserta';
        $user->password = bcrypt(request('password'));
        $user->save();
        //Insert ke Table Peserta
        $request->request->add(['user_id' => $user->id]);
        $peserta = Peserta::create($request->all());

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
        return view('admin.peserta.edit', ['peserta' => $peserta]);
    }
    public function update(PesertaRequest $request, $id)
    {
        $peserta = Peserta::findOrFail($id);
        $peserta->nama_lengkap = $request->input('nama_lengkap');
        $peserta->jenis_kelamin = $request->input('jenis_kelamin');
        $peserta->profesi = $request->input('profesi');
        $peserta->domain = $request->input('domain');
        $peserta->no_hp = $request->input('no_hp');
        $peserta->update();
        return redirect('/peserta')->with('sukses', 'Data berhasil diupdate');
    }
}
