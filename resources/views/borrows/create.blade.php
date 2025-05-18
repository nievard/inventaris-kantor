@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="card shadow-sm mx-auto" style="max-width: 1000px;">
        <div class="card-body">
            <h4 class="card-title mb-4 fw-bold text-center">Form Peminjaman Barang</h4>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Ups!</strong> Ada beberapa kesalahan:<br>
                    <ul class="mb-0 mt-2">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('borrows.store') }}" method="POST">
                @csrf

                <div class="form-floating mb-4">
                    <select 
                        name="item_id" 
                        id="item_id" 
                        class="form-select @error('item_id') is-invalid @enderror" 
                        required
                    >
                        <option selected disabled>Pilih Barang</option>
                        @foreach($items as $item)
                            <option value="{{ $item->id }}">{{ $item->name }} (stok: {{ $item->stock }})</option>
                        @endforeach
                    </select>
                    <label for="item_id">Barang</label>
                    @error('item_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-floating mb-4">
                    <input 
                        type="text" 
                        name="borrower_name" 
                        id="borrower_name" 
                        class="form-control @error('borrower_name') is-invalid @enderror" 
                        placeholder="Nama Peminjam" 
                        required 
                        value="{{ old('borrower_name') }}"
                    >
                    <label for="borrower_name">Nama Peminjam</label>
                    @error('borrower_name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-floating mb-4">
                    <input 
                        type="number" 
                        name="quantity" 
                        id="quantity" 
                        class="form-control @error('quantity') is-invalid @enderror" 
                        placeholder="Jumlah" 
                        required 
                        min="1" 
                        value="{{ old('quantity') }}"
                    >
                    <label for="quantity">Jumlah</label>
                    @error('quantity')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-floating mb-4">
                    <input 
                        type="date" 
                        name="borrow_date" 
                        id="borrow_date" 
                        class="form-control @error('borrow_date') is-invalid @enderror" 
                        value="{{ old('borrow_date', date('Y-m-d')) }}" 
                        required
                    >
                    <label for="borrow_date">Tanggal Pinjam</label>
                    @error('borrow_date')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('borrows.index') }}" class="btn btn-secondary">
                        ← Kembali
                    </a>
                    <button type="submit" class="btn btn-primary fw-semibold">
                        📦 Pinjam
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
