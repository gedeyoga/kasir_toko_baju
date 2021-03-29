@extends('layouts.main')
@section('content')

<!-- DataTables Example -->
<div class="card mb-3">
    <div class="card-header d-flex align-items-center">
        <span><i class="fas fa-plus"></i> Tambah Kategori </span> 
    </div>
    <div class="card-body">
        <form action="{{ route('produk.store') }}" method="post">
        @csrf
            <div class="form-group">
                <label>Nama Produk</label>
                <input type="text" class="form-control" name="produk" value="{{ old('produk') }}">
                @error('produk')
                    <small class="form-text text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label>Kategori</label>
                <select name="kategori_id" class="form-control">
                    <option value="">-- PILIH KATEGORI -- </option>
                    @if(count($kategori) != 0 )
                        @foreach($kategori as $k)
                            <option value="{{ $k->id }}">{{ $k->kategori }}</option>
                        @endforeach
                    @endif
                </select>
                @error('kategori_id')
                    <small class="form-text text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label>Supplier</label>
                <select name="supplier_id" class="form-control">
                    <option value="">-- PILIH SUPPLIER -- </option>
                    @if(count($supplier) != 0 )
                        @foreach($supplier as $s)
                            <option value="{{ $s->id }}">{{ $s->supplier }}</option>
                        @endforeach
                    @endif
                </select>
                @error('supplier_id')
                    <small class="form-text text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label>Harga Beli</label>
                <input type="number" class="form-control" name="hargabeli" value="{{ old('hargabeli') }}">
                @error('hargabeli')
                    <small class="form-text text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label>Harga Jual</label>
                <input type="number" class="form-control" name="hargajual" value="{{ old('hargajual') }}">
                @error('hargajual')
                    <small class="form-text text-danger">{{ $message }}</small>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Tambah</button>
            <a class="btn btn-secondary" href="{{ route('produk.index') }}">Kembali</a>
        </form>
    </div>
</div>
@endsection