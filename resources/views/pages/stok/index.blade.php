@extends('layouts.main')
@section('content')


<!-- DataTables Example -->
<div class="card mb-3">
    <div class="card-header">
        <span><i class="fas fa-table"></i> Stok Terupdate </span> 
    </div>
    <div class="card-body">
    <div class="table-responsive">
        <table class="table table-bordered" id="stokinput" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th width="50px">No</th>
                <th>Produk</th>
                <th>Option</th>
            </tr>
        </thead>
        <tbody>
            @foreach( $data as $i => $d )
                <tr>
                    <td>{{ $i+1 }}</td>
                    <td>
                        {{ ucwords($d->produk) }} <br>
                        {{ ucwords($d->supplier->supplier) }} || {{ ucwords($d->kategori->kategori) }}
                    </td>
                    <td>
                        <a class="btn btn-primary btn-sm" href="{{ route('datastok.detail' , $d->id) }}"><i class="fas fa-info"></i> Detail Stok</a>
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
  <script>
    $(document).ready( function () {
        $('#stokinput').DataTable();
    } );
  </script>
@endpush