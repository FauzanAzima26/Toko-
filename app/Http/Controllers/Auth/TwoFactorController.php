<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PragmaRX\Google2FALaravel\Facade as Google2FA;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class TwoFactorController extends Controller
{
    // Menampilkan halaman untuk setup 2FA
    public function show2faForm(Request $request)
    {
        $user = $request->user();

        // Generate secret jika belum ada
        if (empty($user->google2fa_secret)) {
            $secret = Google2FA::generateSecretKey(); // otomatis >=16 karakter
            $user->google2fa_secret = $secret;
            $user->save();
        }

        // Buat QR code inline untuk aplikasi Authenticator
        $QR_Image = Google2FA::getQRCodeInline(
            config('app.name'), // nama aplikasi
            $user->email,
            $user->google2fa_secret
        );

        return view('auth.2fa_setup', [
            'qr' => $QR_Image,
            'secret' => $user->google2fa_secret,
        ]);
    }

    // Verifikasi kode OTP saat aktivasi 2FA
    public function enable2fa(Request $request)
    {
        $request->validate([
            'otp' => 'required|digits:6',
        ]);

        $user = $request->user();

        // ===== DEBUG LOG =====
    \Log::info('User ID (enable2fa): '.$user->id);
    \Log::info('Secret key (enable2fa): '.$user->google2fa_secret);
    \Log::info('OTP input (enable2fa): '.$request->otp);
    // =====================

        $google2fa = new \PragmaRX\Google2FA\Google2FA();
$valid = $google2fa->verifyKey($user->google2fa_secret, $request->otp, 2); // window = 1

        if ($valid) {
            $user->is_2fa_enabled = 1; // aktifkan 2FA
            $user->save();

            return redirect()->route('frontend.home')
                ->with('success', 'Two-Factor Authentication berhasil diaktifkan.');
        }

        return back()->with('error', 'Kode OTP salah. Pastikan kode yang dimasukkan benar.');
    }

    // Menampilkan form verifikasi OTP saat login
    public function showVerifyForm()
    {
        if (!session('2fa:user:id')) {
            return redirect('/login')->with('error', 'Sesi login tidak valid.');
        }

        return view('auth.2fa_verify');
    }

    // Verifikasi kode OTP setelah login
    public function verify2fa(Request $request)
    {
        $request->validate([
            'otp' => 'required|digits:6',
        ]);

        $userId = session('2fa:user:id');
        $user = User::find($userId);

        if (!$user) {
            return redirect('/login')->with('error', 'Sesi login tidak valid.');
        }

            // ===== DEBUG LOG =====
    \Log::info('User ID (verify2fa): '.$user->id);
    \Log::info('Secret key (verify2fa): '.$user->google2fa_secret);
    \Log::info('OTP input (verify2fa): '.$request->otp);

        $google2fa = new \PragmaRX\Google2FA\Google2FA();
$valid = $google2fa->verifyKey($user->google2fa_secret, $request->otp, 2); // window = 1

        if ($valid) {
            Auth::login($user);
            session()->forget('2fa:user:id');

            // Redirect berdasarkan role
            if ($user->role === 'admin') {
                return redirect('/admin/inventaris');
            } elseif ($user->role === 'customer') {
                return redirect('/');
            }

            return redirect('/');
        }

        return back()->with('error', 'Kode OTP salah.');
    }
}
