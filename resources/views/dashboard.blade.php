@extends('layouts.app')

@section('content')
<div class="container py-5 animate__animated animate__fadeIn">
    <div class="row g-4 justify-content-center">
        <div class="col-md-4">
            <div class="card shadow-lg border-0 rounded-4 h-100 hover-zoom">
                <div class="card-body text-center py-4">
                    <div class="mb-3">
                        <i class="bi bi-tags fs-1 text-primary"></i>
                    </div>
                    <h5 class="fw-bold">Kategori</h5>
                    <h2 class="display-6 fw-bold text-primary">{{ $totalKategori ?? 0 }}</h2>
                    <p class="text-muted">Jumlah kategori tersedia</p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-lg border-0 rounded-4 h-100 hover-zoom">
                <div class="card-body text-center py-4">
                    <div class="mb-3">
                        <i class="bi bi-box-seam fs-1 text-success"></i>
                    </div>
                    <h5 class="fw-bold">Barang</h5>
                    <h2 class="display-6 fw-bold text-success">{{ $totalBarang ?? 0 }}</h2>
                    <p class="text-muted">Total barang inventaris</p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-lg border-0 rounded-4 h-100 hover-zoom">
                <div class="card-body text-center py-4">
                    <div class="mb-3">
                        <i class="bi bi-arrow-left-right fs-1 text-warning"></i>
                    </div>
                    <h5 class="fw-bold">Peminjaman</h5>
                    <h2 class="display-6 fw-bold text-warning">{{ $totalPeminjaman ?? 0 }}</h2>
                    <p class="text-muted">Jumlah seluruh peminjaman</p>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection

@push('styles')
<style>
    .hover-zoom {
        transition: transform 0.3s ease;
    }
    .hover-zoom:hover {
        transform: translateY(-5px) scale(1.02);
    }
</style>
@endpush
