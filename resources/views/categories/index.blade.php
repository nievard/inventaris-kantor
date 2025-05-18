@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h2 class="mb-4 fw-bold">Daftar Kategori</h2>

    <div class="mb-3">
        <a href="{{ route('categories.create') }}" class="btn btn-primary">
            <i class="fas fa-plus me-1"></i> Tambah Kategori
        </a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table align-middle table-bordered table-hover">
                    <thead class="table-light">
                        <tr>
                            <th>ID</th>
                            <th>Nama Kategori</th>
                            <th style="width: 160px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->name }}</td>
                            <td>
                                <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-warning btn-sm">
                                    Edit
                                </a>
                                <form action="{{ route('categories.destroy', $category->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3" class="text-center">Belum ada kategori.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
