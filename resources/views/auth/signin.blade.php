@extends('layouts.auth')

@section('content')
<div class="card col-md-6 col-lg-4">
  <div class="text-center mb-4">
      <h3>Login</h3>
      <p>Selamat Datang Silakan Login Terlebih Dahulu</p>
  </div>
  <form action="{{ route('storeLogin') }}" method="POST">
      @csrf
      <div class="form-group mb-3 d-flex align-items-center">
          <label for="username">Username</label>
          <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" id="username">
          @error('username')
              <div class="invalid-feedback">
                  {{ $message }}
              </div>
          @enderror
      </div>
      <div class="form-group mb-4 d-flex align-items-center">
          <label for="password">Password</label>
          <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
          @error('password')
              <div class="invalid-feedback">
                  {{ $message }}
              </div>
          @enderror
      </div>
      <div class="d-flex mb-4 align-items-center">
          <label class="control control--checkbox mb-0">
              <input type="checkbox" checked="checked"/>
              <div class="control__indicator"></div>
              <span class="caption">Remember me</span>
          </label>
      </div>
      <div class="mb-3 @error('password') mt-4 @enderror">
          Tidak mempunyai akun? <a href="/signup" class="text-decoration-none">Register</a>
      </div>
      @if (Route::has('password.request'))
          <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
              {{ __('Forgot your password?') }}
          </a>
      @endif
      <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>
      <p class="mt-3 mb-3 text-muted">&copy; SPK Penerimaan Bantuan UMKM {{ now()->year }}</p>
      <span class="text-center d-block text-left my-4 text-muted">&mdash; or login with &mdash;</span>
      <div class="social-login text-center">
          <a href="{{ route('signin.google') }}" class="google">
              <span class="icon-google mr-3"></span>
          </a>
      </div>
  </form>
</div>
@endsection
