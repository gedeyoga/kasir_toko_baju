@extends('layouts.main')
@section('content')

<!-- DataTables Example -->
<div class="card mb-3">
    <div class="card-header d-flex align-items-center">
        <span><i class="fas fa-plus"></i> Tambah Kategori </span> 
    </div>
    <div class="card-body">
        <form action="{{ route('kategori.store') }}" method="post">
        @csrf
            <div class="form-group">
                <label>Kategori</label>
                <input type="text" class="form-control" name="kategori" value="{{ old('kategori') }}">
                @error('kategori')
                    <small class="form-text text-danger">{{ $message }}</small>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Tambah</button>
            <a class="btn btn-secondary" href="{{ route('kategori.index') }}">Kembali</a>
        </form>
    </div>
</div>
@endsection