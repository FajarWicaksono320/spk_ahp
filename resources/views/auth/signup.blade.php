@extends('layouts.auth')

@section('content')
  {{-- <div class="content mt-7 p-7 m-7">
    <div class="container">
      <div class="row"> --}}
        {{-- <div class="col-md-6">
          <img src="/assetsLogin/images/undraw_remotely_2j6y.svg" alt="Image" class="img-fluid">
        </div> --}}
        {{-- <div class="content"> --}}
          <div class="card col-md-6 col-lg-4">
              <div class="text-center mb-4">
                  <h3>Register</h3>
                  <p class="mb-4">Buat Akun Terlebih Dahulu</p>
              </div>
  
              <form action="/signup" method="POST">
                  @csrf
  
                  <div class="form-group d-flex align-items-center">
                      <label for="name">Nama Lengkap</label>
                      <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" autocomplete="off" required>
                      @error('name')
                      <div class="invalid-feedback">
                          {{ $message }}
                      </div>
                      @enderror
                  </div>
  
                  <div class="form-group d-flex align-items-center">
                      <label for="username">Username</label>
                      <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" value="{{ old('username') }}" autocomplete="off" required>
                      @error('username')
                      <div class="invalid-feedback">
                          {{ $message }}
                      </div>
                      @enderror
                  </div>
  
                  <div class="form-group d-flex align-items-center">
                      <label for="email">Email</label>
                      <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" autocomplete="off" required>
                      @error('email')
                      <div class="invalid-feedback">
                          {{ $message }}
                      </div>
                      @enderror
                  </div>
  
                  <div class="form-group d-flex align-items-center">
                      <label for="password">Password</label>
                      <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required>
                      @error('password')
                      <div class="invalid-feedback">
                          {{ $message }}
                      </div>
                      @enderror
                  </div>
  
                  <div class="my-2">
                      {!! NoCaptcha::renderJs() !!}
                      {!! NoCaptcha::display() !!}
                      @error('g-recaptcha-response')
                      <span class="help-block text-danger">
                          <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                      </span>
                      @enderror
                  </div>
  
                  <div class="mb-2 @error('password') mt-4 @enderror">
                      Sudah Memiliki Akun?
                      <a href="/signin" class="text-decoration-none">Login</a>
                  </div>
  
                  <button class="w-100 btn btn-lg btn-primary" type="submit">Register</button>
                  <p class="mt-3 mb-3 text-muted">&copy; SPK Penerimaan Bantuan UMKM {{ now()->year }}</p>
  
                  <span class="text-center d-block text-left my-4 text-muted">&mdash; or login with &mdash;</span>
  
                  <div class="social-login">
                      <a href="{{ route('signin.google') }}" class="google">
                          <span class="icon-google mr-3"></span>
                      </a>
                  </div>
              </form>
          </div>
      {{-- </div> --}}

      {{-- </div>
    </div>
  </div> --}}
@endsection
