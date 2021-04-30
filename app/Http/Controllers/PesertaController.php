<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peserta;
use App\Models\User;
use App\Models\Workshop;
use App\Http\Requests\PesertaRequest;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class PesertaController extends Controller
{
    public function index(Request $request)
    {
        $peserta = Peserta::orderBy('created_at', 'DESC')->get();
        $workshop = Workshop::with(['peserta' => function ($query) {
        }])->where('id', $peserta)->first();
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
        $peserta->province_id = $request->input('province_id');
        $peserta->no_hp = $request->input('no_hp');
        $peserta->update();
        return redirect('/peserta')->with('sukses', 'Data berhasil diupdate');
    }

    public function feedback_peserta($id)
    {
        $peserta = Peserta::findOrFail($id);
        return view('admin.workshop.feedback-peserta', ['peserta' => $peserta]);
    }

    public function feedback_update(Request $request, $id)
    {
        $peserta = Peserta::findOrFail($id);
        $peserta->feedback = $request->feedback;
        $peserta->update();
        $workshop = Workshop::with(['peserta' => function ($query) {
        }])->where('id', $id)->first();
        return redirect()->route('workshop-detail', ['id' => $workshop->id])->with('sukses', 'Feedback Terkirim!');
    }

    public function naskah_peserta(Request $request)
    {

        $peserta = Peserta::where('user_id', Auth::user()->id)->where('workshop_id', $request->workshop_id)->first();

        if ($request->hasFile('naskah')) {
            $naskah = $request->file('naskah');
            $filename = time() . '.' . $naskah->getClientOriginalExtension();
            $request->file('naskah')->move('naskah-workshop/', $filename);
            $peserta->naskah = $filename;
        }
        $peserta->update();
        return redirect()->back()->with('sukses', 'Naskah Terkirim!');
    }

    public function getDownload($name)
    {
        $file = public_path() . "/naskah-workshop/" . $name;
        $headers = array(
            'Content-type : application/msword',
        );
        $format_nama = Carbon::now() . $name;
        return response()->download($file, $format_nama, $headers);
    }

    public function peserta_dashboard()
    {
        $peserta = Peserta::with('workshop')->where('user_id', Auth::user()->id)->get();
        // foreach ($pesertaas $workshops) {
        //     dd(Carbon::now()->format('Y m d') == Carbon::parse($workshops->tanggal_pelaksanaan)->format('Y m d'));
        // }
        return view('peserta.dashboard-peserta', compact("peserta"));
    }
}
