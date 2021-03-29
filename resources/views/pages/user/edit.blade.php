@extends('layouts.main')
@section('content')

<!-- DataTables Example -->
<div class="card mb-3">
    <div class="card-header d-flex align-items-center">
        <span><i class="fas fa-pen"></i> Edit User </span> 
    </div>
    <div class="card-body">
        <form action="{{ route('user.update' , $data->id) }}" method="post">
        @csrf
        @method('PATCH')
            <div class="form-group">
                <label>Nama</label>
                <input type="text" class="form-control" name="name" value="{{ $data->name }}">
                @error('name')
                    <small class="form-text text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label>Email</label>
                <p>{{ $data->email }}</p>
            </div>
            <div class="form-group">
                <label>Masukkan Password Baru</label>
                <input type="password" class="form-control" name="password">
                @error('password')
                    <small class="form-text text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label>Ulangi Password Baru</label>
                <input type="password" class="form-control" name="password_confirmation">
            </div>
            <button type="submit" class="btn btn-primary">Ubah</button>
            <a class="btn btn-secondary" href="{{ route('user.index') }}">Kembali</a>
        </form>
    </div>
</div>
@endsection