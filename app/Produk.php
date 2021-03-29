<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Produk extends Model
{
    use SoftDeletes;

    protected $table = 'produk';
    protected $fillable = ['produk' , 'kategori_id' , 'supplier_id' , 'hargabeli' , 'hargajual'];
    protected $hidden = [];

    public function kategori(){
        return $this->belongsTo(Kategori::class , 'kategori_id' , 'id')->withTrashed();
    }
    public function supplier(){
        return $this->belongsTo(Supplier::class , 'supplier_id' , 'id')->withTrashed();
    }
}
