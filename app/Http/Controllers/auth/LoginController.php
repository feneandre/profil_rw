<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        if (Auth::guard('kecamatan')->check()) {
            return redirect()->route('kecamatan.dashboard');
        } elseif (Auth::guard('rw')->check()) {
            return redirect()->route('rw.dashboard');
        } elseif (Auth::guard('rt')->check()) {
            return redirect()->route('rt.dashboard');
        }
        
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        \Log::info('Login attempt', [
            'email' => $request->email,
            'password_length' => strlen($request->password)
        ]);

        // Cek apakah user ada di database
        $kecamatan = \App\Models\Kecamatan::where('email', $request->email)->first();
        $rw = \App\Models\Rw::where('email', $request->email)->first();
        $rt = \App\Models\Rt::where('email', $request->email)->first();

        \Log::info('User found?', [
            'kecamatan' => $kecamatan ? 'yes' : 'no',
            'rw' => $rw ? 'yes' : 'no',
            'rt' => $rt ? 'yes' : 'no'
        ]);

        // Cek di tabel kecamatan
        if (Auth::guard('kecamatan')->attempt($credentials)) {
            \Log::info('Kecamatan login success');
            $request->session()->regenerate();
            session(['guard_name' => 'kecamatan']);
            return redirect()->intended(route('kecamatan.dashboard'));
        }
        
        // Cek di tabel RW
        if (Auth::guard('rw')->attempt($credentials)) {
            \Log::info('RW login success');
            $request->session()->regenerate();
            session(['guard_name' => 'rw']);
            return redirect()->intended(route('rw.dashboard'));
        }
        
        // Cek di tabel RT
        if (Auth::guard('rt')->attempt($credentials)) {
            \Log::info('RT login success');
            $request->session()->regenerate();
            session(['guard_name' => 'rt']);
            return redirect()->intended(route('rt.dashboard'));
        }

        \Log::error('Login failed for ' . $request->email);
        
        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->withInput($request->only('email'));
    }

    public function logout(Request $request)
    {
        Auth::guard('kecamatan')->logout();
        Auth::guard('rw')->logout();
        Auth::guard('rt')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}