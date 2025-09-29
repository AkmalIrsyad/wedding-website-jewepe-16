@extends('layouts.skydash')

@section('contentadm')
<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-md-12 grid-margin">
        <div class="row">
          <div class="col-12 col-xl-8 mb-4 mb-xl-0">
            <h3 class="font-weight-bold">Welcome {{ Auth::user()->name }}</h3>
            <h6 class="font-weight-normal mb-0">All systems are running smoothly! </h6>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <!-- Cuaca -->
      <div class="col-md-6 grid-margin stretch-card">
        <div class="card tale-bg">
          <div class="card-people mt-auto">
            <img src="{{ asset('skydash/dist/assets/images/dashboard/people.svg') }}" alt="people">
            <div class="weather-info">
              @if($weather)
              <div class="d-flex">
                <div>
                  <h2 class="mb-0 font-weight-normal">
                    <i class="mdi mdi-weather-cloudy me-2"></i>
                    {{ $weather['main']['temp'] }}<sup>°C</sup>
                  </h2>
                </div>
                <div class="ms-2">
                  <h4 class="location font-weight-normal">{{ $weather['name'] }}</h4>
                  <h6 class="font-weight-normal">{{ ucfirst($weather['weather'][0]['description']) }}</h6>
                </div>
              </div>
              @else
              <p>Gagal memuat data cuaca</p>
              @endif
            </div>
          </div>
        </div>
      </div>

      <!-- Statistik -->
      <div class="col-md-6 grid-margin transparent">
        <div class="row">
          <div class="col-md-6 mb-4 stretch-card transparent">
            <div class="card card-tale">
              <div class="card-body">
                <p class="mb-4">Total Katalog</p>
                <p class="fs-30 mb-2">{{ $totalKatalog }}</p>
              </div>
            </div>
          </div>
          <div class="col-md-6 mb-4 stretch-card transparent">
            <div class="card card-dark-blue">
              <div class="card-body">
                <p class="mb-4">Total Pesanan</p>
                <p class="fs-30 mb-2">{{ $totalPesanan }}</p>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 mb-4 mb-lg-0 stretch-card transparent">
            <div class="card card-light-blue">
              <div class="card-body">
                <p class="mb-4">Pesanan Menunggu</p>
                <p class="fs-30 mb-2">{{ $pesananMenunggu }}</p>
              </div>
            </div>
          </div>
          <div class="col-md-6 stretch-card transparent">
            <div class="card card-light-danger">
              <div class="card-body">
                <p class="mb-4">Pesanan Diterima</p>
                <p class="fs-30 mb-2">{{ $pesananDiterima }}</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- content-wrapper ends -->
</div>
@endsection
