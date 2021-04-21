<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\Peserta;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;

class AuthController extends Controller
{

    public function __construct()
    {
        $this->redirectTo = url()->previous();
    }
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
                return Redirect::to(Session::get('url.intended'));
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
        $user->province_id = 0;
        $user->save();

        return redirect('login')->with('success', 'Register Success');
    }

    public function login()
    {
        if(Auth::user())return redirect ('/home');
        Session::put('url.intended', URL::previous());
        return view('login');
    }

    public function register()
    {
        if(Auth::user())return redirect ('/home');
        return view('register');
    }
    public function showLoginForm()
    {
        if (!session()->has('url.intended')) {
            session(['url.intended' => url()->previous()]);
        }
        return view('auth.login');
    }
    public function logout()
    {
        Auth::logout();

        return redirect('login')->with('success', 'Logout Success');
    }
}
