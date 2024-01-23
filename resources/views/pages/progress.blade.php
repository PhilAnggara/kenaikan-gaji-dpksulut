@extends('layouts.main')
@section('title', 'Pendaftaran Kenaikan Gaji')
@inject('carbon', 'Carbon\Carbon')

@section('content')
<div class="page-heading">
  <div class="page-title mb-4">
    <div class="row">
      <div class="col-12 col-md-6 order-md-1 order-last">
        <h3>Pendaftaran Kenaikan Gaji</h3>
      </div>
    </div>
  </div>
  <section class="section">

    <div class="card shadow-sm">
      <div class="card-header">
        <h4 class="card-title">{{ progresKeterangan($item) }}</h4>
        <p class="font-thin text-sm">{{ tgl($item->updated_at) }}</p>
      </div>
      <div class="card-body">
        <div class="progress progress-{{ progresStyle($item) }} mb-4">
          <div class="progress-bar progress-lg progress-label @if($item->tahap < 5) progress-bar-striped @endif" role="progressbar" style="width: {{ progresPersen($item->tahap) }}%" aria-valuenow="{{ progresPersen($item->tahap) }}" aria-valuemin="0"
            aria-valuemax="100"></div>
        </div>
        @if ($item->komentar)
          <small class="text-muted">Keterangan :</small>
          <p>{{ $item->komentar }}</p>
        @endif
      </div>
      @if ($item->status != 0)
        <div class="card-footer text-center">
          <form action="{{ route('permohonan.baru', $item->id) }}" method="POST">
            @method('PUT')
            @csrf
            @if ($item->sk)
              <a href="{{ Storage::url($item->sk) }}" target="_blank" class="btn btn-outline-primary">
                <i class="far fa-fw fa-down-to-line"></i>
                Unduh SK
              </a>
            @endif
            <button type="submit" class="btn btn-primary">Buat Permohonan Baru</button>
          </form>
        </div>
      @endif
    </div>
  </section>
</div>
@endsection

@push('prepend-style')
@endpush
@push('addon-style')
@endpush

@push('prepend-script')
@endpush
@push('addon-script')
@endpush