<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    protected $table = 'penjualan';
    protected $fillable = ['kode_penjualan' , 'users_id' , 'total_harga' , 'bayar' , 'kembalian'];

    public function user(){
        return $this->belongsTo(User::class , 'users_id' , 'id');
    }
}
