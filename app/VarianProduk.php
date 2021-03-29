<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VarianProduk extends Model
{
    protected $table = 'varian_produk';
    protected $fillable = ['produk_id' , 'ukuran' , 'warna' , 'stok'];
    protected $hidden = [];

    public function produk(){
        return $this->belongsTo(Produk::class , 'produk_id' , 'id');
    }
    
}
