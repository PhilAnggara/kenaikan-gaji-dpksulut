@extends('layouts.auth')
@section('title', 'Buat Akun')
@section('subtitle', 'Masukan data anda untuk membuat akun.')

@section('content')

<form method="POST" action="{{ route('register') }}">
  @csrf
  <div class="form-group position-relative has-icon-left mb-4">
    <input id="name" type="text" name="name" value="{{ old('name') }}" class="form-control form-control-xl @error('name') is-invalid @enderror" placeholder="Nama" required autocomplete="off" autofocus>
    <div class="form-control-icon">
      <i class="bi bi-person"></i>
    </div>
    @error('name')
      <div class="invalid-feedback">
        <i class="bx bx-radio-circle"></i>
        {{ $message }}
      </div>
    @enderror
  </div>
  <div class="form-group position-relative has-icon-left mb-4">
    <input id="email" type="email" name="email" value="{{ old('email') }}" class="form-control form-control-xl @error('email') is-invalid @enderror" placeholder="Email" required autocomplete="off">
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
    <input id="password" type="password" name="password" class="form-control form-control-xl @error('password') is-invalid @enderror" placeholder="Kata Sandi" required autocomplete="off">
    <div class="form-control-icon">
      <i class="bi bi-shield-lock"></i>
    </div>
    @error('password')
      <div class="invalid-feedback">
        <i class="bx bx-radio-circle"></i>
        {{ $message }}
      </div>
    @enderror
  </div>
  <div class="form-group position-relative has-icon-left mb-4">
    <input id="password_confirmation" type="password" name="password_confirmation" class="form-control form-control-xl @error('password_confirmation') is-invalid @enderror" placeholder="Konfirmasi Kata Sandi" required autocomplete="off">
    <div class="form-control-icon">
      <i class="bi bi-shield-lock"></i>
    </div>
    @error('password_confirmation')
      <div class="invalid-feedback">
        <i class="bx bx-radio-circle"></i>
        {{ $message }}
      </div>
    @enderror
  </div>
  <button type="submit" class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Buat Akun</button>
</form>
<div class="text-center mt-5 text-lg fs-4">
  <p class="text-gray-600">
    Sudah punya akun? <a href="{{ route('login') }}" class="font-bold">Masuk</a>.
  </p>
</div>

@endsection