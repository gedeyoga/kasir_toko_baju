@extends('layouts.main')
@section('content')

<!-- DataTables Example -->
<div class="card mb-3">
    <div class="card-header d-flex align-items-center">
        <span><i class="fas fa-plus"></i> Perbaharui Stok </span> 
    </div>
    <div class="card-body">
        <form action="{{ route('datastok.update' , $stok->id) }}" method="post"> 
        @csrf
        @method('patch')
            <div class="form-group">
                <label>Produk</label>
                <h4>{{ $stok->produk->produk }}</h4>
                <input type="hidden" name="produk_id" value="{{ $stok->produk_id }}">
            </div>
            <div class="form-group">
                <label>Ukuran</label>
                <input class="form-control" type="text" name="ukuran" value="{{ $stok->ukuran }}">
                @error('ukuran')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label>Warna</label>
                <input class="form-control" type="text" name="warna" value="{{ $stok->warna  }}">
                @error('warna')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label>Stok Lama</label>
                <h4>{{ $stok->stok }}</h4>
                <input type="hidden" name="stok_lama" value="{{ $stok->stok }}">
            </div>
            <div class="form-group">
                <label>Tambah Stok</label>
                <input class="form-control" type="text" name="stok" value="">
                @error('stok')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Perbaharui</button>
            <a class="btn btn-secondary" href="{{ route('datastok.detail' , $stok->produk_id) }}">Kembali</a>
        </form>
    </div>
</div>
@endsection