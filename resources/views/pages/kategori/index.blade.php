@extends('layouts.main')
@section('content')


<!-- DataTables Example -->
<div class="card mb-3">
    <div class="card-header d-flex align-items-center">
    <span><i class="fas fa-table"></i> Kategori </span> 
    <a href="{{ route('kategori.create') }}" class=" ml-auto btn btn-primary">Tambah Data</a></div>
    <div class="card-body">
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th width="50px">No</th>
                <th>Kategori</th>
                <th>Option</th>
            </tr>
        </thead>
        <tbody>
            @foreach( $data as $i => $d )
                <tr>
                    <td>{{ $i+1 }}</td>
                    <td>{{ ucwords($d->kategori) }}</td>
                    <td class="d-flex">
                        <a href="{{ route('kategori.edit' , $d->id) }}" class="btn btn-primary mr-2 btn-sm">
                            <i class="fas fa-pen"></i>
                            Edit
                        </a>
                        <form action="{{ route('kategori.destroy' , $d->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" type="submit" name="delete">
                                <i class="fas fa-trash"></i>
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
        </table>
    </div>
    </div>
</div>
@endsection

@push('alert')
  @if(session('status'))
  <script>
    $('#alertModal').modal('show');
  </script>
  @endif
@endpush