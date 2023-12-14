<div class="modal fade text-left" id="tambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
  aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="myModalLabel1">Tambah Pengguna</h5>
        <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
          <i data-feather="x"></i>
        </button>
      </div>
      <form action="{{ route('kelola-pengguna.store') }}" method="POST">
        @csrf
        <div class="modal-body">

          <div class="form-group">
            <label for="name">Nama Lengkap</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" placeholder="Nama Lengkap" required autocomplete="off">
            @error('name')
              <div class="invalid-feedback">
                <i class="bx bx-radio-circle"></i>
                {{ $message }}
              </div>
            @enderror
          </div>

          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" placeholder="Email" required autocomplete="off">
            @error('email')
              <div class="invalid-feedback">
                <i class="bx bx-radio-circle"></i>
                {{ $message }}
              </div>
            @enderror
          </div>
          
          <fieldset class="form-group">
            <label for="role">Jabatan</label>
            <select class="form-select" id="role" name="role" required>
              <option value="" selected disabled>-- Pilih Jabatan --</option>
              <option {{ old('role') == 'Sub Bagian Kepegawaian' ? 'selected' : '' }}>Sub Bagian Kepegawaian</option>
              <option {{ old('role') == 'Dinas Daerah' ? 'selected' : '' }}>Dinas Daerah</option>
            </select>
          </fieldset>

          <div class="form-group">
            <label for="password">Kata Sandi</label>
            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Kata Sandi" required autocomplete="off">
            @error('password')
              <div class="invalid-feedback">
                <i class="bx bx-radio-circle"></i>
                {{ $message }}
              </div>
            @enderror
          </div>

          <div class="form-group">
            <label for="password_confirmation">Konfirmasi Kata Sandi</label>
            <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" name="password_confirmation" placeholder="Konfirmasi Kata Sandi" required autocomplete="off">
            @error('password_confirmation')
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
            Simpan
          </button>
        </div>
      </form>
    </div>
  </div>
</div>

@foreach ($items as $item)
<div class="modal fade text-left" id="detail-{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
  aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="myModalLabel1">Data Pengguna</h5>
        <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
          <i data-feather="x"></i>
        </button>
      </div>
      <div class="modal-body">
        
      </div>
    </div>
  </div>
</div>
@endforeach