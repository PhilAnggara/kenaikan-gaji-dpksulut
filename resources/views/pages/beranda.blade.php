@extends('layouts.main')
@section('title', 'Beranda')
@inject('carbon', 'Carbon\Carbon')

@section('content')
<div class="page-heading">
  <div class="page-title mb-4">
    <div class="row">
      <div class="col">
        <h3><span id="typed"></span></h3>
      </div>
    </div>
  </div>
  <section class="section">
    
    @if ($showAlert)
      <div class="alert alert-secondary alert-dismissible fade show" role="alert">
        <i class="bi bi-exclamation-circle"></i>
        Data diri anda belum lengkap. <a href="{{ route('informasi-pribadi.index') }}" class="alert-link text-dark text-decoration-underline">Lengkapi sekarang</a>.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif

    <div class="card shadow-sm">
      <div class="card-header">
        <h4 class="card-title">Lorem, ipsum.</h4>
      </div>
      <div class="card-body">
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium, officia!
      </div>
    </div>
  </section>
</div>
@endsection


@push('prepend-style')
@endpush
@push('addon-style')
<script src="{{ url('assets/vendors/typed/typed.js') }}"></script>
<style>
  h3 {
    min-height: 33.5px;
  }
</style>
@endpush

@push('prepend-script')
@endpush
@push('addon-script')
<script src="{{ url('assets/scripts/beranda.js') }}"></script>
@endpush