@extends('layouts.main')
@section('title', 'Permohonan Kenaikan Gaji')
@inject('carbon', 'Carbon\Carbon')

@section('content')
<div class="page-heading">
  <div class="page-title mb-4">
    <div class="row">
      <div class="col-12 col-md-6 order-md-1 order-last">
        <h3>Permohonan Kenaikan Gaji</h3>
      </div>
    </div>
  </div>
  <section class="section">

    <div class="card shadow-sm">
      <div class="card-body">
        <table class="table table-striped table-hover text-center" id="table1">
          <thead>
            <tr>
              <th class="text-center"></th>
              <th class="text-center">NIP</th>
              <th class="text-center">Nama</th>
              <th class="text-center">Tanggal Permohonan</th>
              <th class="text-center">Detail</th>
              <th class="text-center"></th>
              <th class="text-center"></th>
            </tr>
          </thead>
          <tbody>
            @foreach ($items as $item)
              <tr>
                <td>
                  @if ($item->status == 0)
                    @if ($item->tahap == 4)
                      <i class="fad fa-fw fa-circle-chevron-up text-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="Menunggu SK diterbitkan"></i>
                    @else
                      <i class="fad fa-fw fa-circle-o text-info" data-bs-toggle="tooltip" data-bs-placement="top" title="Sedang berjalan"></i>
                    @endif
                  @elseif ($item->status == 1)
                    <i class="fad fa-fw fa-circle-check text-success" data-bs-toggle="tooltip" data-bs-placement="top" title="Permohonan selesai"></i>
                  @else
                    <i class="fad fa-fw fa-circle-xmark text-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="Permohonan ditolak"></i>
                  @endif
                </td>
                <td>
                  <button class="btn btn-sm icon icon-left btn-outline-secondary rounded-pill" onclick="copyToClipboard('{{ $item->user->nip }}')">
                    <i class="fal fa-clipboard"></i>
                    {{ $item->user->nip }}
                  </button>
                </td>
                <td>{{ $item->user->name }}</td>
                <td>
                  <i class="fal fa-fw fa-calendar-day text-danger"></i>
                  {{ tgl($item->created_at) }}
                </td>
                <td>
                  <button type="button" class="btn btn-sm icon icon-left rounded-pill btn-outline-primary" data-bs-toggle="modal" data-bs-target="#detail-{{ $item->id }}">
                    <i class="fal fa-eye"></i>
                    Lihat Detail
                  </button>
                </td>
                <td>
                  @include('includes.partials.permohonan-button')
                  {{-- @if ($item->status == 0)
                    <div class="btn-group btn-group-sm" role="group">
                      <button type="button" class="btn icon icon-left btn-outline-success" onclick="setujui({{ $item->id }}, 'Setujui Permohonan', 'Setujui permohonan kenaikan gaji berkala {{ $item->user->name }}?')">
                        Setujui
                      </button>
                      <form action="{{ route('permohonan-kenaikan-gaji.update', $item->id) }}" id="setujui-{{ $item->id }}" method="POST">
                        @method('PUT')
                        @csrf
                        <input type="hidden" name="persetujuan" value="1">
                      </form>
                      <button type="button" class="btn icon icon-left btn-outline-danger" data-bs-toggle="modal" data-bs-target="#tolak-{{ $item->id }}">
                        Tolak
                      </button>
                    </div>
                  @elseif ($item->status == 1)
                    <button type="button" class="btn btn-sm icon icon-left btn-outline-success" disabled>
                      Selesai
                    </button>
                  @else
                    <button type="button" class="btn btn-sm icon icon-left btn-outline-secondary" disabled>
                      Ditolak
                    </button>
                  @endif

                  @if ($item->tahap == 4)
                    <button type="button" class="btn btn-sm icon icon-left btn-outline-success" data-bs-toggle="modal" data-bs-target="#uploadSk-{{ $item->id }}">
                      Kirim SK
                    </button>
                  @endif --}}
                </td>
                <td>
                  <button type="button" class="btn icon icon-left" data-bs-toggle="modal" data-bs-target="#komentar-{{ $item->id }}">
                    <i class="far fa-fw fa-comment-exclamation text-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="Keterangan"></i>
                  </button>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
    
  </section>
</div>
@include('includes.modals.modal-permohonan')
@endsection


@push('prepend-style')
<link rel="stylesheet" href="{{ url('assets/extensions/simple-datatables/style.css') }}">
<link rel="stylesheet" href="{{ url('assets/compiled/css/table-datatable.css') }}">
<link rel="stylesheet" href="{{ url('assets/extensions/filepond/filepond.css') }}">
<link rel="stylesheet" href="{{ url('assets/extensions/filepond-plugin-image-preview/filepond-plugin-image-preview.css') }}">
<link rel="stylesheet" href="{{ url('assets/extensions/toastify-js/src/toastify.css') }}">
@endpush
@push('addon-style')
@endpush

@push('prepend-script')
@endpush
@push('addon-script')
<script src="{{ url('assets/extensions/simple-datatables/umd/simple-datatables.js') }}"></script>
<script src="{{ url('assets/scripts/simple-datatables.js') }}"></script>
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