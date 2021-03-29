<?php

use Illuminate\Support\Facades\Route;
use App\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::prefix('dashboard')->middleware('auth')->group(function(){
    Route::resource('user' , 'UserController');
    Route::resource('kategori' , 'KategoriController');
    Route::resource('supplier' , 'SupplierController');
    Route::resource('produk' , 'ProdukController');
    
    // Data Stok
    Route::get('/datastok' , 'VarianProdukController@index')->name('datastok.index');
    Route::get('/datastok/detail/{id}' , 'VarianProdukController@detail')->name('datastok.detail');
    Route::get('/datastok/tambah/{id}' , 'VarianProdukController@tambah')->name('datastok.tambah');
    Route::post('/datastok/proses' , 'VarianProdukController@store')->name('datastok.store');
    Route::get('/datastok/perbaharui/{id}' , 'VarianProdukController@perbaharui')->name('datastok.perbaharui');
    Route::patch('/datastok/proses/{id}' , 'VarianProdukController@update')->name('datastok.update');
    Route::delete('/datastok/proses/{id}' , 'VarianProdukController@destroy')->name('datastok.destroy');
});
