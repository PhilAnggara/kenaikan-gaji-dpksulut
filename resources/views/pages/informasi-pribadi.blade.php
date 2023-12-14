@extends('layouts.main')
@section('title', 'Informasi Pribadi')
@inject('carbon', 'Carbon\Carbon')

@section('content')
<div class="page-heading">
  <div class="page-title mb-4">
    <div class="row">
      <div class="col-12 col-md-6 order-md-1 order-last">
        <h3>Informasi Pribadi</h3>
      </div>
    </div>
  </div>
  <section class="section">
    <div class="row">
      <div class="col-12 col-lg-4">
        <div class="card shadow-sm">
          <div class="card-body">
            <div class="d-flex justify-content-center align-items-center flex-column">
              <div class="avatar avatar-2xl">
                <img src="https://ui-avatars.com/api/?background=0075B9&color=fff&bold=true&name={{ auth()->user()->name }}" alt="Avatar">
              </div>

              <h3 class="mt-3">{{ auth()->user()->name }}</h3>
              <p class="text-small">{{ auth()->user()->role }}</p>
            </div>
          </div>
        </div>
      </div>
      <div class="col-12 col-lg-8">
        <div class="card shadow-sm">
          <div class="card-body">
            <form action="#" method="get">
              <div class="form-group">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Your Name" value="{{ auth()->user()->name }}">
              </div>
              <div class="form-group">
                <label for="email" class="form-label">Email</label>
                <input type="text" name="email" id="email" class="form-control" placeholder="Your Email"
                  value="{{ auth()->user()->email }}">
              </div>
              <div class="form-group">
                <label for="phone" class="form-label">Nomor Telepon</label>
                <input type="text" name="phone" id="phone" class="form-control" placeholder="Your Phone"
                  value="083xxxxxxxxx">
              </div>
              <div class="form-group">
                <label for="birthday" class="form-label">Tanggal Lahir</label>
                <input type="date" name="birthday" id="birthday" class="form-control" placeholder="Your Birthday">
              </div>
              <div class="form-group">
                <label for="gender" class="form-label">Jenis Kelamin</label>
                <select name="gender" id="gender" class="form-control">
                  <option value="male">Laki-laki</option>
                  <option value="female">Perempuan</option>
                </select>
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary">Save Changes</button>
              </div>
            </form>
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
@endpush

@push('prepend-script')
@endpush
@push('addon-script')
@endpush