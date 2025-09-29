@extends('layouts.startbootstrap')

@section('content')
<section class="container py-5">
    <div class="row justify-content-center">
        <!-- Package Image -->
        <div class="col-lg-5 col-md-6 mb-4">
            <div class="card border-0 shadow">
                <img src="{{ asset('uploads/catalogues/'.$catalogue->image) }}"
                     class="card-img-top"
                     alt="{{ $catalogue->package_name }}"
                     style="height: 350px; object-fit: cover;">
            </div>
        </div>

        <!-- Package Details & Order Form -->
        <div class="col-lg-7 col-md-6">
            <!-- Package Info -->
            <div class="mb-4">
                <h2 class="fw-bold text-dark">{{ $catalogue->package_name }}</h2>
                <h3 class="text-primary fw-bold">Rp {{ number_format($catalogue->price, 0, ',', '.') }}</h3>
                <div class="mt-3 text-muted">
                    {!! $catalogue->description !!}
                </div>
            </div>

            <!-- Order Form -->
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">
                        <i class="fas fa-heart me-2"></i>Pesan Paket Ini
                    </h5>
                </div>
                <div class="card-body">
                    <!-- Alert Messages -->
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show">
                            <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="alert alert-danger alert-dismissible fade show">
                            <i class="fas fa-exclamation-circle me-2"></i>{{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    <form action="{{ route('order.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="catalogue_id" value="{{ $catalogue->catalogue_id }}">

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Nama Lengkap</label>
                                <input type="text" name="name"
                                       class="form-control @error('name') is-invalid @enderror"
                                       value="{{ old('name') }}"
                                       placeholder="Masukkan nama lengkap">
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Email</label>
                                <input type="email" name="email"
                                       class="form-control @error('email') is-invalid @enderror"
                                       value="{{ old('email') }}"
                                       placeholder="contoh@email.com">
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Nomor Telepon</label>
                                <input type="text" name="phone_number"
                                       class="form-control @error('phone_number') is-invalid @enderror"
                                       value="{{ old('phone_number') }}"
                                       placeholder="08xxxxxxxxxx">
                                @error('phone_number')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Tanggal Pernikahan</label>
                                <input type="date" name="wedding_date"
                                       class="form-control @error('wedding_date') is-invalid @enderror"
                                       value="{{ old('wedding_date') }}">
                                @error('wedding_date')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary btn-lg">
                                <i class="fas fa-paper-plane me-2"></i>Pesan Sekarang
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Back Button -->
            <div class="mt-4 text-center">
                <a href="{{ route('landing.catalogues') }}" class="btn btn-outline-secondary">
                    <i class="fas fa-arrow-left me-2"></i>Kembali ke Katalog
                </a>
            </div>
        </div>
    </div>
</section>
@endsection
