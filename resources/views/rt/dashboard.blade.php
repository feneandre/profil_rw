@extends('rt.layout')

@section('title', 'Dashboard RT')

@section('content')
<div class="row">
  <div class="col-md-12 grid-margin">
    <div class="row">
      <div class="col-12 col-xl-8 mb-4 mb-xl-0">
        <h3 class="font-weight-bold">Selamat Datang {{ Auth::guard('rt')->user()->nama }}</h3>
        <h6 class="font-weight-normal mb-0">Sistem Informasi RT <span class="text-primary">Kelurahan Kesambi</span></h6>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-6 grid-margin stretch-card">
    <div class="card tale-bg">
      <div class="card-people mt-auto">
        <img src="{{asset('asset/images/dashboard/people.svg')}}" alt="people">
      </div>
    </div>
  </div>
  <div class="col-md-6 grid-margin transparent">
    <div class="row">
      <div class="col-md-6 mb-4 stretch-card transparent">
        <div class="card card-tale">
          <div class="card-body">
            <p class="mb-4">Total Kepala Keluarga</p>
            <p class="fs-30 mb-2">500</p>
          </div>
        </div>
      </div>
      <div class="col-md-6 mb-4 stretch-card transparent">
        <div class="card card-dark-blue">
          <div class="card-body">
            <p class="mb-4">Total Penduduk</p>
            <p class="fs-30 mb-2">5.000</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection