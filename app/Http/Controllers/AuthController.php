<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\Peserta;
use App\Models\ResetPassword;
use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    protected $link = 'http://localhost:8000';
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
                return redirect()->route('workshop')->with('success', 'Selamat Datang');
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

        return redirect('signin')->with('success', 'Register Success');
    }

    public function signin()
    {
        if (Auth::user()) return redirect('/');
        Session::put('url.intended', URL::previous());
        return view('login');
    }

    public function register()
    {
        if (Auth::user()) return redirect('/');
        return view('register');
    }
    public function showLoginForm()
    {
        if (!session()->has('url.intended')) {
            session(['url.intended' => url()->previous()]);
        }
        return view('login');
    }
    public function logout()
    {
        Auth::logout();

        return redirect()->route('signin')->with('success', 'Logout Success');
    }

    public function processForgotPassword(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        if (!$user) {
            return redirect()->back()->with('status', 'email tidak ada');
        }
        $token = Str::random(200);
        $reset_password = new ResetPassword();
        $reset_password->email = $request->email;
        $reset_password->token = $token;
        $reset_password->revoked = 0;
        $reset_password->save();

        $to = $user->email;
        $toMail = $user->email;
        $data = array('name' => $user->name, "body" => "this link for verify your account", "url" => $this->link . "/password-reset/" . $reset_password->token);
        Mail::send('emails.mail', $data, function ($message) use ($to, $toMail) {
            $message->to($to, $toMail)->subject('Reset Password');
            $message->from('buatanindonesia1@gmail.com', 'ODTW');
        });

        return redirect()->back()->with('status', 'harap cek email kamu');
    }

    public function showResetPassword($token)
    {
        $reset_password = ResetPassword::where('token', $token)->first();
        if ($reset_password->revoked == 1) {
            return redirect()->route('home');
        }
        return view('auth.password_reset', compact('token'));
    }


    public function resetPassword(Request $request, $token)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);

        $reset_password = ResetPassword::orderBy('created_at', 'desc')->where('token', $token)->where('revoked', 0)->first();
        if ($request->email !== $reset_password->email) {
            return redirect()->back()->with('sukses', 'Email tidak sama');
        }
        $reset_password->revoked = 1;
        $reset_password->update();
        $user = User::where('email', $reset_password->email)->first();
        $user->password = Hash::make($request->password);
        $user->update();

        return redirect()->route('signin')->with('success', 'password berhasil diganti');
    }
}
