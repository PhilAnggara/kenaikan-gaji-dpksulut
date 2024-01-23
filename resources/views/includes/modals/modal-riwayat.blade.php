@foreach ($items as $item)
<div class="modal fade text-left" id="dokumen-{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
  aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="myModalLabel1">Dokumen Pengajuan</h5>
        <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
          <i data-feather="x"></i>
        </button>
      </div>
      <div class="modal-body">

        <div class="container">
          <p class="fw-bold">SK Berkala Terakhir</p>
          @include('includes.partials.file-card', ['file_path' => $item->sk_berkala])
        </div>

        <div class="container">
          <p class="fw-bold">SK Pangkat Terakhir</p>
          @include('includes.partials.file-card', ['file_path' => $item->sk_pangkat])
        </div>

        <div class="container">
          <p class="fw-bold">SKP</p>
          @include('includes.partials.file-card', ['file_path' => $item->skp])
        </div>

        <div class="container">
          <p class="fw-bold">Pengantar Kepala Sekolah</p>
          @include('includes.partials.file-card', ['file_path' => $item->pengantar_kepsek])
        </div>

      </div>
    </div>
  </div>
</div>


<div class="modal fade text-left" id="komentar-{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
  aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="myModalLabel1">{{ progresKeterangan($item) }}</h5>
        <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
          <i data-feather="x"></i>
        </button>
      </div>
      <div class="modal-body">
        <small class="text-muted">Keterangan :</small>
        <p>{{ $item->komentar }}</p>
      </div>
    </div>
  </div>
</div>
@endforeach