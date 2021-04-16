<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\Peserta;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login_process(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // Attempt to log the user in
        // Passwordnya pake bcrypt
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();
            if ($user->role == 'peserta') {
                return redirect()->route('peserta-dashboard')->with('success', 'Selamat Datang');
            } else if ($user->role == 'admin') {
                return redirect()->route('admin-dashboard')->with('success', 'Selamat Datang');
            } else {
                return back()->with('success', 'Invalid Credentials');
            }
        } else {
            return back()->with('success', 'invalid credentials');
        }
    }

    public function register_process(RegisterRequest $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = 'peserta';
        $user->password = bcrypt(request('password'));

        $user->save();
        $peserta = new Peserta();
        $peserta->user_id = $user->id;
        $peserta->nama_lengkap = $user->name;
        $peserta->jenis_kelamin = 'L';
        $peserta->profesi = 'Siswa';
        $peserta->domisili = 'Jakarta';
        $peserta->no_hp = '0';
        $peserta->save();
        return redirect('login')->with('success', 'Register Success');
    }

    public function login()
    {
        return view('login');
    }

    public function register()
    {
        return view('register');
    }

    public function logout()
    {
        Auth::logout();

        return redirect('login')->with('success', 'Logout Success');
    }
}
