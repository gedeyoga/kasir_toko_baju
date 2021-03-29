@extends('layouts.main')
@section('content')

<!-- DataTables Example -->
<div class="card mb-3">
    <div class="card-header d-flex align-items-center">
        <span><i class="fas fa-plus"></i> Tambah Stok </span> 
    </div>
    <div class="card-body">
        <form action="{{ route('datastok.store') }}" method="post">
        @csrf
            <div class="form-group">
                <label>Produk</label>
                <h4>{{ $data->produk }}</h4>
                <input type="hidden" name="produk_id" value="{{ $data->id }}">
            </div>
            <div class="form-group">
                <label>Ukuran</label>
                <input class="form-control" type="text" name="ukuran" value="{{ old('ukuran') }}">
                @error('ukuran')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label>Warna</label>
                <input class="form-control" type="text" name="warna" value="{{ old('warna') }}">
                @error('warna')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label>Stok</label>
                <input class="form-control" type="text" name="stok" value="{{ old('stok') }}">
                @error('stok')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Tambah</button>
            <a class="btn btn-secondary" href="{{ route('datastok.detail' , $data->id) }}">Kembali</a>
        </form>
    </div>
</div>
@endsection