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

    {{-- <div class="card shadow-sm">
      <div class="card-header">
        <h4 class="card-title">Lorem, ipsum.</h4>
      </div>
      <div class="card-body">
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium, officia!
      </div>
    </div> --}}

    <div class="row">
      <div class="col-6 col-lg-3 col-md-6">
        <div class="card">
          <div class="card-body px-4 py-4-5">
            <div class="row">
              <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                <div class="stats-icon purple mb-2">
                  <i class="fad fa-fw fa-list-check"></i>
                </div>
              </div>
              <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                <h6 class="text-muted font-semibold mb-0">Total</h6>
                <h6 class="text-muted font-semibold">Permohonan</h6>
                <h6 class="font-extrabold mb-0">{{ $a }}</h6>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-6 col-lg-3 col-md-6">
        <div class="card">
          <div class="card-body px-4 py-4-5">
            <div class="row">
              <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                <div class="stats-icon blue mb-2">
                  <i class="fad fa-fw fa-spinner"></i>
                </div>
              </div>
              <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                <h6 class="text-muted font-semibold mb-0">Sedang</h6>
                <h6 class="text-muted font-semibold">Berjalan</h6>
                <h6 class="font-extrabold mb-0">{{ $b }}</h6>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-6 col-lg-3 col-md-6">
        <div class="card">
          <div class="card-body px-4 py-4-5">
            <div class="row">
              <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                <div class="stats-icon green mb-2">
                  <i class="fad fa-fw fa-circle-check"></i>
                </div>
              </div>
              <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                <h6 class="text-muted font-semibold mb-0">Permohonan</h6>
                <h6 class="text-muted font-semibold">Selesai</h6>
                <h6 class="font-extrabold mb-0">{{ $c }}</h6>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-6 col-lg-3 col-md-6">
        <div class="card">
          <div class="card-body px-4 py-4-5">
            <div class="row">
              <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                <div class="stats-icon red mb-2">
                  <i class="fad fa-fw fa-circle-x"></i>
                </div>
              </div>
              <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                <h6 class="text-muted font-semibold mb-0">Permohonan</h6>
                <h6 class="text-muted font-semibold">Ditolak</h6>
                <h6 class="font-extrabold mb-0">{{ $d }}</h6>
              </div>
            </div>
          </div>
        </div>
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