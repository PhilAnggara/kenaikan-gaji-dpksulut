@extends('layouts.main')
@section('title', 'Beranda')
@inject('carbon', 'Carbon\Carbon')

@section('content')
<div class="page-heading">
  <div class="page-title mb-4">
    <div class="row">
      <div class="col-12 col-md-6 order-md-1 order-last">
        <h3>Beranda</h3>
      </div>
    </div>
  </div>
  <section class="section">
    <div class="card shadow-sm">
      <div class="card-header">
        <h4 class="card-title">Lorem, ipsum.</h4>
      </div>
      <div class="card-body">
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium, officia!
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