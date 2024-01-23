@foreach ($items as $item)
<div class="modal fade text-left" id="detail-{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
  aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="myModalLabel1">Detail Pengajuan</h5>
        <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
          <i data-feather="x"></i>
        </button>
      </div>
      <div class="modal-body">

        <div class="divider my-3">
          <div class="divider-text fw-bold">Data Pemohon</div>
        </div>
        
        <div class="table-responsive">
          <table class="table table-hover">
            <tbody>
              <tr>
                <th>Nama</th>
                <td>{{ $item->user->name }}</td>
              </tr>
              <tr>
                <th>NIP</th>
                <td>
                  @if ($item->user->nip)
                    <button class="btn btn-sm icon icon-left btn-outline-secondary rounded-pill" onclick="copyToClipboard('{{ $item->user->user }}')">
                      <i class="fal fa-clipboard"></i>
                      {{ $item->user->nip }}
                    </button>
                  @else
                    -
                  @endif
                </td>
              </tr>
              <tr>
                <th>Email</th>
                <td>
                  <i class="fal fa-fw fa-envelope"></i>
                  {{ $item->user->email }}
                </td>
              </tr>
              <tr>
                <th>No Telp</th>
                <td>
                  @if ($item->user->telp)
                    <i class="fal fa-fw fa-phone"></i>
                    {{ $item->user->telp }}
                  @else
                    -
                  @endif
                </td>
              </tr>
              <tr>
                <th>Tanggal Lahir</th>
                <td>
                  @if ($item->user->tgl_lahir)
                    <i class="fal fa-fw fa-calendar-day text-danger"></i>
                    {{ tgl($item->user->tgl_lahir) }}
                  @else
                    -
                  @endif
                </td>
              </tr>
              <tr>
                <th>Jenis Kelamin</th>
                <td>
                  @if ($item->user->jenis_kelamin)
                    <i class="fal fa-fw fa-{{ $item->user->jenis_kelamin === "Laki-laki" ? "mars text-primary" : "venus text-danger" }}"></i>
                    {{ $item->user->jenis_kelamin }}
                  @else
                    -
                  @endif
                </td>
              </tr>
            </tbody>
          </table>
        </div>

        <div class="divider my-3">
          <div class="divider-text fw-bold">Berkas Pemohon</div>
        </div>

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

<div class="modal fade text-left" id="tolak-{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
  aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="myModalLabel1">Tolak Permohonan</h5>
        <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
          <i data-feather="x"></i>
        </button>
      </div>
      
      <form action="{{ route('permohonan-kenaikan-gaji.update', $item->id) }}" method="POST">
        @method('PUT')
        @csrf
        <input type="hidden" name="persetujuan" value="0">
        <div class="modal-body">

          <div class="form-group">
            <label for="komentar">Alasan Penolakan</label>
            <textarea class="form-control @error('komentar') is-invalid @enderror" id="komentar" name="komentar" value="{{ old('no') }}" placeholder="Alasan Penolakan" required  rows="3"></textarea>
            @error('komentar')
              <div class="invalid-feedback">
                <i class="bx bx-radio-circle"></i>
                {{ $message }}
              </div>
            @enderror
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn" data-bs-dismiss="modal">
            Batal
          </button>
          <button type="submit" class="btn btn-primary ms-1">
            Kirim
          </button>
        </div>
      </form>
      
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
      @if ($item->status == 2)
        <div class="modal-body">
          <small class="text-muted">Keterangan :</small>
          <p>{{ $item->komentar }}</p>
        </div>
      @endif
    </div>
  </div>
</div>


<div class="modal fade text-left" id="uploadSk-{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="myModalLabel1">Kirim SK</h5>
        <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
          <i data-feather="x"></i>
        </button>
      </div>
      <form action="{{ route('permohonan-kenaikan-gaji.update', $item->id) }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <input type="hidden" name="uploadSK" value="1">
        <div class="modal-body">

          <div class="form-group">
            <input type="file" class="basic-filepond @error('sk') is-invalid @enderror" id="sk" name="sk" value="{{ old('sk') }}" required>
            @error('sk')
              <div class="invalid-feedback">
                <i class="bx bx-radio-circle"></i>
                {{ $message }}
              </div>
            @enderror
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn" data-bs-dismiss="modal">
            Batal
          </button>
          <button type="submit" class="btn btn-primary ms-1">
            Unggah
          </button>
        </div>
      </form>
    </div>
  </div>
</div>
@endforeach