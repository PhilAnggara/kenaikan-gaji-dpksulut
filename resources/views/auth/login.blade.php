@extends('layouts.auth')
@section('title', 'Masuk')
@section('subtitle', 'Masuk dengan data anda yang anda masukkan saat pendaftaran.')

@section('content')

<form method="POST" action="{{ route('login') }}">
  @csrf
  <div class="form-group position-relative has-icon-left mb-4">
    <input id="email" type="email" name="email" value="{{ old('email') }}" class="form-control form-control-xl @error('email') is-invalid @enderror" placeholder="Email" required autocomplete="off" autofocus>
    <div class="form-control-icon">
      <i class="bi bi-envelope"></i>
    </div>
    @error('email')
      <div class="invalid-feedback">
        <i class="bx bx-radio-circle"></i>
        {{ $message }}
      </div>
    @enderror
  </div>
  <div class="form-group position-relative has-icon-left mb-4">
    <input id="password" type="password" name="password" class="form-control form-control-xl" placeholder="Kata Sandi" required>
    <div class="form-control-icon">
      <i class="bi bi-shield-lock"></i>
    </div>
  </div>
  <div class="form-check form-check-lg d-flex align-items-end">
    <input id="remember_me" name="remember" type="checkbox" class="form-check-input me-2">
    <label class="form-check-label text-gray-600" for="remember_me">
      Tetap masuk
    </label>
  </div>
  <button type="submit" class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Masuk</button>
</form>
<div class="text-center mt-5 text-lg fs-4">
  <p class="text-gray-600">
    Belum punya akun? <a href="{{ route('register') }}" class="font-bold">Buat akun</a>.
  </p>
</div>

@endsection