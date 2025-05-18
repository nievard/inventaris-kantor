@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Barang</h1>

    <form action="{{ route('items.update', $item->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Nama Barang</label>
            <input type="text" name="name" class="form-control" value="{{ $item->name }}" required>
        </div>

        <div class="mb-3">
            <label>Kategori</label>
            <select name="category_id" class="form-control" required>
                @foreach($categories as $cat)
                    <option value="{{ $cat->id }}" {{ $cat->id == $item->category_id ? 'selected' : '' }}>{{ $cat->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Stok</label>
            <input type="number" name="stock" class="form-control" value="{{ $item->stock }}" required min="0">
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
