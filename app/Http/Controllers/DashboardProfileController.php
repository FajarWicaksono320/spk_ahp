<?php

namespace App\Http\Controllers;

use App\Http\Requests\Profile\ProfileUpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DashboardProfileController extends Controller
{
  public function index()
  {
    return view('dashboard.profile.index', [
      'title'    => 'Profile',
      'userData' => auth()->user()
    ]);
  }

  public function update(ProfileUpdateRequest $request, User $user)
  {
    $this->authorize('update', $user);

    $validate = $request->validated();

    if ($validate['oldPassword'] ?? false) {
      //check password
      if (Hash::check($validate['oldPassword'], $user->password)) {
        // password match
        $newPass = Hash::make($validate['password']);

        User::where('id', $user->id)
          ->update(['password' => $newPass]);

        return redirect('/dashboard/profile')
          ->with('Berhasil', "Berhasil Diperbarui!");
      } else {
        return redirect('/dashboard/profile')
          ->with('Gagal', "Password Tidak Sesuai!");
      }
    }

    User::where('id', $user->id)
      ->update($validate);

    return redirect('/dashboard/profile')
      ->with('Berhasil', "Profil Berhasil Diperbarui!");
  }
}
