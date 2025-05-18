@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="card shadow-sm mx-auto" style="max-width: 1000px;">
        <div class="card-body">
            <h4 class="card-title mb-4 fw-bold text-center">Tambah Kategori</h4>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Ups!</strong> Ada masalah pada input:<br>
                    <ul class="mb-0 mt-2">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('categories.store') }}" method="POST">
                @csrf
                <div class="form-floating mb-4">
                    <input 
                        type="text" 
                        name="name" 
                        id="name" 
                        class="form-control @error('name') is-invalid @enderror" 
                        placeholder="Contoh: Elektronik" 
                        required 
                        value="{{ old('name') }}"
                    >
                    <label for="name">Nama Kategori</label>
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('categories.index') }}" class="btn btn-secondary">
                        ← Kembali
                    </a>
                    <button type="submit" class="btn btn-primary fw-semibold">
                        💾 Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
