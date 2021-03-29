<?php

namespace App\Http\Controllers;

use App\Produk;
use App\VarianProduk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VarianProdukController extends Controller
{
    public function index()
    {
        // $data = DB::table('produk')
        //         ->join('kategori', 'produk.kategori_id', '=', 'kategori.id')
        //         ->join('supplier', 'produk.supplier_id', '=', 'supplier.id')
        //         ->leftJoin('varian_produk' , 'produk.id' , '=','varian_produk.produk_id')
        //         ->select('produk.*', 'kategori.kategori', 'supplier.supplier' , 'varian_produk.*')
        //         ->where('produk_id' , '<>',null)
        //         ->orderByDesc('produk.id')
        //         ->get();

        $data = Produk::with(['kategori' , 'supplier'])->orderByDesc('id')->get();
        return view('pages.stok.index' , ['data' => $data]);
    }

    public function detail($id){
        $detail = Produk::with(['kategori' , 'supplier'])->find($id);
        $stok = VarianProduk::where('produk_id' , $id)->orderByDesc('id')->get();

       
        return view('pages.stok.detail' , [
            'detail' => $detail,
            'stok' => $stok
        ]);
    }

    public function tambah($id){
        $data = Produk::find($id);
        return view('pages.stok.add' , [
            'data' => $data
        ]);
    }

    public function store(Request $request){
        $request->validate([
            'produk_id' => 'required',
            'ukuran' => 'required|string',
            'warna' => 'required|string|min:2',
            'stok' => 'required|integer'
        ]);

        $data = $request->all();
        VarianProduk::create($data);
        return redirect()->route('datastok.detail' , $data['produk_id'])->with('status' , 'Berhasil menambahkan stok !');
    }

    public function perbaharui($id){
        $stok = VarianProduk::with('produk')->find($id);
        return view('pages.stok.edit' , [
            'stok' => $stok
        ]);
    }

    public function update(Request $request , $id){

        $validation = [];
        $data = [];
        if(empty($request->stok) ){
            $validation = [
                'produk_id' => 'required',
                'ukuran' => 'required|string',
                'warna' => 'required|string|min:2'
            ];
            $data = $request->except(['stok' , 'stok_lama']);
        }else{
            $validation = [
                'produk_id' => 'required',
                'ukuran' => 'required|string',
                'warna' => 'required|string|min:2',
                'stok' => 'integer'
            ];
            $data = $request->except('stok_lama');
            $data['stok'] = $request->stok + $request->stok_lama;
        }
        $request->validate($validation);

        VarianProduk::find($id)->update($data);

        return redirect()->route('datastok.detail' , $request->produk_id)->with('status' , 'Berhasil memperbaharui stok !');
    }

    public function destroy($id){
        $data = VarianProduk::findOrFail($id);
        $data->delete();

        return redirect()->route('datastok.detail' , $data['produk_id'])->with('status' , 'Berhasil menghapus stok !');
    }
    
}
