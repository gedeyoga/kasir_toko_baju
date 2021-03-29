@extends('layouts.main')
@section('content')

<!-- DataTables Example -->
<div class="card mb-3">
    <div class="card-header d-flex align-items-center">
        <span><i class="fas fa-plus"></i> Edit Kategori </span> 
    </div>
    <div class="card-body">
        <form action="{{ route('kategori.update' , $data->id) }}" method="post">
        @csrf
        @method('PATCH')
            <div class="form-group">
                <label>Kategori</label>
                <input type="text" class="form-control" name="kategori" value="{{ $data->kategori }}">
                @error('kategori')
                    <small class="form-text text-danger">{{ $message }}</small>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Edit</button>
            <a class="btn btn-secondary" href="{{ route('kategori.index') }}">Kembali</a>
        </form>
    </div>
</div>
@endsection