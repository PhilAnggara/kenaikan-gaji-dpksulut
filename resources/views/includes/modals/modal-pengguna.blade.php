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
        
        <div class="table-responsive">
          <table class="table table-hover">
            <tbody>
              <tr>
                <th>Nama</th>
                <td>{{ $item->name }}</td>
              </tr>
              <tr>
                <th>NIP</th>
                <td>
                  @if ($item->nip)
                    <button class="btn btn-sm icon icon-left btn-outline-secondary rounded-pill" onclick="copyToClipboard('{{ $item->user }}')">
                      <i class="fal fa-clipboard"></i>
                      {{ $item->nip }}
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
                  {{ $item->email }}
                </td>
              </tr>
              <tr>
                <th>No Telp</th>
                <td>
                  @if ($item->telp)
                    <i class="fal fa-fw fa-phone"></i>
                    {{ $item->telp }}
                  @else
                    -
                  @endif
                </td>
              </tr>
              <tr>
                <th>Tanggal Lahir</th>
                <td>
                  @if ($item->tgl_lahir)
                    <i class="fal fa-fw fa-calendar-day text-danger"></i>
                    {{ tgl($item->tgl_lahir) }}
                  @else
                    -
                  @endif
                </td>
              </tr>
              <tr>
                <th>Jenis Kelamin</th>
                <td>
                  @if ($item->jenis_kelamin)
                    <i class="fal fa-fw fa-{{ $item->jenis_kelamin === "Laki-laki" ? "mars text-primary" : "venus text-danger" }}"></i>
                    {{ $item->jenis_kelamin }}
                  @else
                    -
                  @endif
                </td>
              </tr>
              <tr>
                <th>Hak Akses</th>
                <td>
                  @if ($item->role == 'Kepala Dinas')
                    <span class="badge bg-light-danger">{{ $item->role }}</span>
                  @elseif ($item->role == 'Sub Bagian Kepegawaian')
                    <span class="badge bg-light-primary">{{ $item->role }}</span>
                  @elseif ($item->role == 'Dinas Daerah')
                    <span class="badge bg-light-secondary">{{ $item->role }}</span>
                  @else
                    <span class="badge bg-light-success">{{ $item->role }}</span>
                  @endif
                </td>
              </tr>
            </tbody>
          </table>
        </div>

      </div>
    </div>
  </div>
</div>
@endforeach