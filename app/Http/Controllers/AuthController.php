<?php

namespace App\Http\Controllers;

use session;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Auth\AuthSignInRequest;
use App\Http\Requests\Auth\AuthSignUpRequest;

class AuthController extends Controller
{
  public function index()
  {
    $data = [
      'title' => 'SPK Pemilihan Penerimaan Bantuan UMKM | Sign In',
    ];

    return view('auth.signin', $data);
  }

  public function signUp()
  {
    $data = [
      'title' => 'SPK Pemilihan Penerimaan Bantuan UMKM | Sign Up',
    ];

    return view('auth.signup', $data);
  }

  public function store(AuthSignUpRequest $request)
  {
     // Validasi data yang masuk
     $validate = $request->validated();

     // Enkripsi password
     $validate['password'] = Hash::make($validate['password']);
 
     // Buat pengguna baru
     $user = User::create($validate);
 
     // Kirim email verifikasi
     $user->sendEmailVerificationNotification();
 
     // Redirect ke halaman login dengan pesan sukses
     return redirect('/signin')->with('Berhasil', 'Akun Berhasil Dibuat! Silakan cek email Anda untuk verifikasi.');
  }

  public function authenticate(AuthSignInRequest $request)
  {
    $credentials = $request->validated();

    // autentikasi user
    if (Auth::attempt($credentials)) {
      $request->session()->regenerate();

      return redirect()->intended('/dashboard');
    }

    // sign in gagal
    return back()->with('Gagal', "Gagal Masuk, Coba Lagi");
  }

  public function signOut(Request $request)
  {
    Auth::logout();

    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect('/signin')->with('Berhasil', 'Kamu Berhasil Keluar!');

  }
}
