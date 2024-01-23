<input type="file" class="basic-filepond @error($id) is-invalid @enderror" id="{{ $id }}" name="{{ $id }}" required>
@error($id)
  <div class="invalid-feedback">
    <i class="bx bx-radio-circle"></i>
    {{ $message }}
  </div>
@enderror