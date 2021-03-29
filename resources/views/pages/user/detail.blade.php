@extends('layouts.main')
@section('content')

<!-- DataTables Example -->
<div class="card mb-3">
    <div class="card-header d-flex align-items-center">
        <span><i class="fas fa-info"></i> Detail User </span> 
    </div>
    <div class="card-body">
        <div class="form-group">
            <label>Nama</label>
            <h4>{{ $data->name }}</h4>
        </div>
        <div class="form-group">
            <label>Email</label>
            <h4>{{ $data->email }}</h4>
        </div>
    </div>
    <div class="card-footer">
        <a class="btn btn-primary" href="{{ route('user.edit' , $data->id) }}">Edit</a>
        <a class="btn btn-secondary" href="{{ route('user.index') }}">Kembali</a>
    </div>
</div>
@endsection