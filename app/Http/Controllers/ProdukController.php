<?php

namespace App\Http\Controllers;

use App\Produk;
use App\Kategori;
use App\Supplier;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Produk::with(['kategori' , 'supplier'])->orderByDesc('id')->get();
        return view('pages.produk.index' , ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = Kategori::all();
        $supplier = Supplier::all();

        return view('pages.produk.add' , [
            'kategori' => $kategori,
            'supplier' => $supplier
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'produk' => 'required|string|min:2',
            'kategori_id' => 'required|integer',
            'supplier_id' => 'required|integer',
            'hargabeli' => 'required|integer',
            'hargajual' => 'required|integer'
        ]);
        $data = $request->all();
        Produk::create($data);
        return redirect()->route('produk.index')->with('status' , 'Berhasil menambahkan data !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kategori = Kategori::all();
        $supplier = Supplier::all();
        $data = Produk::find($id);

        return view('pages.produk.edit' , [
            'kategori' => $kategori,
            'supplier' => $supplier,
            'data' => $data
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'produk' => 'required|string|min:2',
            'kategori_id' => 'required|integer',
            'supplier_id' => 'required|integer',
            'hargabeli' => 'required|integer',
            'hargajual' => 'required|integer'
        ]);
        $data = $request->all();
        Produk::find($id)->update($data);
        return redirect()->route('produk.index')->with('status' , 'Berhasil memperbaharui data !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Produk::findOrFail($id);
        $data->delete();

        return redirect()->route('produk.index')->with('status' , 'Berhasil menghapus data !');
    }
}
