@extends('layouts.main')
@section('content')

<!-- DataTables Example -->
<div class="card mb-3">
    <div class="card-header bg-success text-white">
        <span><i class="fas fa-info"></i> Detail Stok Produk </span> 
    </div>
    <div class="card-body">
        <div class="form-row">
            <div class="form-group col-md-6">
                <label>Produk</label>
                <h4>{{ $detail->produk }}</h4>
            </div>
            <div class="form-group col-md-6">
                <label>Harga Beli</label>
                <h4>Rp. {{ number_format($detail->hargabeli) }}</h4>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label>Supplier</label>
                <h4>{{ $detail->supplier->supplier }}</h4>
            </div>
            <div class="form-group col-md-6">
                <label>Harga Jual</label>
                <h4>Rp. {{ number_format($detail->hargajual) }}</h4>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label>Kategori</label>
                <h4>{{ $detail->kategori->kategori }}</h4>
            </div>
        </div>
    </div>
    <div class="card-footer d-flex">
        <a class="ml-auto btn btn-primary" href="{{ route('datastok.tambah' , $detail->id) }}">Tambah Stok</a>
        <a class="ml-2 btn btn-secondary" href="{{ route('datastok.index') }}">Kembali</a>
    </div>
</div>

<!-- Tabel Tambah Stok -->
<div class="card mb-3">
    <div class="card-header">
        <span><i class="fas fa-table"></i> Stok Produk {{ $detail->produk }} </span> 
    </div>
    <div class="card-body">
    <div class="table-responsive">
        <table class="table table-bordered" id="stokinput" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th width="50px">No</th>
                <th>Ukuran</th>
                <th>Warna</th>
                <th>Stok</th>
                <th>Option</th>
            </tr>
        </thead>
        <tbody>
            @foreach( $stok as $i => $d )
                <tr>
                    <td>{{ $i+1 }}</td>
                    <td>{{ ucwords($d->ukuran) }}</td>
                    <td>{{ ucwords($d->warna) }}</td>
                    <td>{{ ucwords($d->stok) }}</td>
                    <td class='d-flex'>
                        <a class="btn btn-success btn-sm mr-2" href="{{ route('datastok.perbaharui' , $d->id) }}"><i class="fas fa-pen"></i> Perbaharui</a>
                        <form action="{{ route('datastok.destroy' , $d->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger btn-sm" type="submit" name="delete"><i class="fas fa-trash"></i> Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
        </table>
    </div>
    </div>
</div>
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

@endsection