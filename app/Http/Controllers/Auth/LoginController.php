<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/admin/inventaris';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

    /**
     * Handle a successful authentication attempt.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return \Illuminate\Http\Response
     */
     protected function authenticated($request, $user)
{
    // Jika user belum punya secret, arahkan ke setup 2FA
    if (empty($user->google2fa_secret)) {
        return redirect()->route('2fa.setup');
    }

    // Jika secret ada tapi 2FA belum diaktifkan, arahkan ke enable
    if (!$user->is_2fa_enabled) {
        return redirect()->route('2fa.setup'); // atau bisa buat route khusus enable
    }

    // Jika 2FA aktif, arahkan ke verifikasi OTP
    if ($user->is_2fa_enabled) {
        Auth::logout();
        session(['2fa:user:id' => $user->id]);
        return redirect()->route('2fa.verify.form');
    }

    // Redirect berdasarkan role
    if ($user->role === 'admin') {
        return redirect('/admin/inventaris');
    } elseif ($user->role === 'customer') {
        return redirect('/');
    }

    return redirect('/');
}

}