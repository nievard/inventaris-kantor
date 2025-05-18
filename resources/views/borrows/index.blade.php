@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h2 class="mb-4 fw-bold">Daftar Peminjaman</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="mb-3">
        <a href="{{ route('borrows.create') }}" class="btn btn-primary">
            <i class="fas fa-plus me-1"></i> Peminjaman Baru
        </a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table align-middle table-bordered table-hover">
                    <thead class="table-light">
                        <tr>
                            <th>Barang</th>
                            <th>Peminjam</th>
                            <th>Jumlah</th>
                            <th>Tanggal</th>
                            <th>Status</th>
                            <th style="width: 180px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($borrows as $borrow)
                        <tr>
                            <td>{{ $borrow->item->name }}</td>
                            <td>{{ $borrow->borrower_name }}</td>
                            <td>{{ $borrow->quantity }}</td>
                            <td>{{ $borrow->borrow_date }}</td>
                            <td>
                                <span class="badge {{ $borrow->status == 'borrowed' ? 'bg-warning' : 'bg-success' }}">
                                    {{ ucfirst($borrow->status) }}
                                </span>
                            </td>
                            <td>
                                @if($borrow->status == 'borrowed')
                                    <a href="{{ route('borrows.return', $borrow->id) }}" class="btn btn-success btn-sm">Kembalikan</a>
                                @endif
                                <form action="{{ route('borrows.destroy', $borrow->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus data ini?')">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center">Belum ada data peminjaman.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
