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

    @if (completeUserInformation())

      <div class="card shadow-sm">
        <div class="card-header">
          <h4 class="card-title">Unggah berkas-berkas yang diperlukan untuk melakukan pendaftaran kenaikan gaji berkala</h4>
        </div>
        <div class="card-body">
          <form action="{{ route('kirim-pendaftaran') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
              <div class="col-md-6 col-12">
                <div class="form-group">
                  <label for="sk_berkala">SK Berkala Terakhir</label>
                  @include('includes.partials.filepond', ['id' => 'sk_berkala'])
                </div>
              </div>
              <div class="col-md-6 col-12">
                <div class="form-group">
                  <label for="sk_pangkat">SK Pangkat Terakhir</label>
                  @include('includes.partials.filepond', ['id' => 'sk_pangkat'])
                </div>
              </div>
              <div class="col-md-6 col-12">
                <div class="form-group">
                  <label for="skp">SKP</label>
                  @include('includes.partials.filepond', ['id' => 'skp'])
                </div>
              </div>
              <div class="col-md-6 col-12">
                <div class="form-group">
                  <label for="pengantar_kepsek">Pengantar Kepala Sekolah</label>
                  @include('includes.partials.filepond', ['id' => 'pengantar_kepsek'])
                </div>
              </div>
              <div class="col-12 d-flex justify-content-end mt-4">
                <button type="submit" class="btn btn-primary me-1 mb-1">Kirim</button>
              </div>
            </div>
          </form>
        </div>
      </div>
      
      @if ($items->isNotEmpty())
        <div class="card shadow-sm">
          <div class="card-header">
            <h4 class="card-title">Riwayat permohonan kenaikan gaji</h4>
          </div>
          <div class="card-body">
            <table class="table table-striped table-hover text-center" id="table1">
              <thead>
                <tr>
                  <th class="text-center">Tanggal Permohonan</th>
                  <th class="text-center">Dokumen</th>
                  <th class="text-center">Status</th>
                  <th class="text-center"></th>
                </tr>
              </thead>
              <tbody>
                @foreach ($items as $item)
                  <tr>
                    <td>
                      <i class="fal fa-fw fa-calendar-day text-danger"></i>
                      {{ tgl($item->created_at) }}
                    </td>
                    <td>
                      <button type="button" class="btn btn-sm icon icon-left rounded-pill btn-outline-primary" data-bs-toggle="modal" data-bs-target="#dokumen-{{ $item->id }}">
                        <i class="fal fa-folder-open"></i>
                        Lihat Dokumen
                      </button>
                    </td>
                    <td>
                      @if ($item->status == 1)
                        <span class="badge bg-success">Selesai</span>
                      @else
                        <span class="badge bg-danger">Ditolak</span>
                      @endif
                    </td>
                    <td>
                      @if ($item->status == 1)
                        <a href="{{ Storage::url($item->sk) }}" target="_blank" class="btn icon icon-left text-primary">
                          <i class="far fa-fw fa-down-to-line"></i>
                          Unduh SK
                        </a>
                      @else
                        <button type="button" class="btn icon icon-left" data-bs-toggle="modal" data-bs-target="#komentar-{{ $item->id }}">
                          <i class="far fa-fw fa-comment-exclamation text-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="Keterangan"></i>
                        </button>
                      @endif
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      @endif
        
    @else

      <div class="alert alert-secondary alert-dismissible fade show" role="alert">
        <i class="bi bi-exclamation-circle"></i>
        Data diri anda belum lengkap. <a href="{{ route('informasi-pribadi.index') }}" class="alert-link text-dark text-decoration-underline">Lengkapi sekarang</a>.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>

    @endif
    
  </section>
</div>
@include('includes.modals.modal-riwayat')
@endsection


@push('prepend-style')
<link rel="stylesheet" href="{{ url('assets/extensions/filepond/filepond.css') }}">
<link rel="stylesheet" href="{{ url('assets/extensions/filepond-plugin-image-preview/filepond-plugin-image-preview.css') }}">
<link rel="stylesheet" href="{{ url('assets/extensions/toastify-js/src/toastify.css') }}">
@endpush
@push('addon-style')
@endpush

@push('prepend-script')
@endpush
@push('addon-script')
<script src="{{ url('assets/extensions/filepond-plugin-file-validate-size/filepond-plugin-file-validate-size.min.js') }}"></script>
<script src="{{ url('assets/extensions/filepond-plugin-file-validate-type/filepond-plugin-file-validate-type.min.js') }}"></script>
<script src="{{ url('assets/extensions/filepond-plugin-image-crop/filepond-plugin-image-crop.min.js') }}"></script>
<script src="{{ url('assets/extensions/filepond-plugin-image-exif-orientation/filepond-plugin-image-exif-orientation.min.js') }}"></script>
<script src="{{ url('assets/extensions/filepond-plugin-image-filter/filepond-plugin-image-filter.min.js') }}"></script>
<script src="{{ url('assets/extensions/filepond-plugin-image-preview/filepond-plugin-image-preview.min.js') }}"></script>
<script src="{{ url('assets/extensions/filepond-plugin-image-resize/filepond-plugin-image-resize.min.js') }}"></script>
<script src="{{ url('assets/extensions/filepond/filepond.js') }}"></script>
<script src="{{ url('assets/extensions/toastify-js/src/toastify.js') }}"></script>
<script src="{{ url('assets/scripts/filepond.js') }}"></script>
@endpush