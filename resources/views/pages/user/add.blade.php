@extends('layouts.main')
@section('content')

<!-- DataTables Example -->
<div class="card mb-3">
    <div class="card-header d-flex align-items-center">
        <span><i class="fas fa-plus"></i> Tambah User </span> 
    </div>
    <div class="card-body">
        <form action="{{ route('user.store') }}" method="post">
        @csrf
            <div class="form-group">
                <label>Nama</label>
                <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                @error('name')
                    <small class="form-text text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                @error('email')
                    <small class="form-text text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" name="password">
                @error('password')
                    <small class="form-text text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label>Ulangi Password</label>
                <input type="password" class="form-control" name="password_confirmation">
            </div>
            <button type="submit" class="btn btn-primary">Tambah</button>
            <a class="btn btn-secondary" href="{{ route('user.index') }}">Kembali</a>
        </form>
    </div>
</div>
@endsection