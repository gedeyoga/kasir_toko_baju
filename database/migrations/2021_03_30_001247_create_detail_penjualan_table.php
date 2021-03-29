<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailPenjualanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_penjualan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('penjualan_id');
            $table->foreign('penjualan_id')->references('id')->on('penjualan')->onDelete('cascade');
            $table->unsignedBigInteger('produk_id');
            $table->foreign('produk_id')->references('id')->on('produk')->onDelete('cascade');
            $table->unsignedBigInteger('varian_produk_id');
            $table->foreign('varian_produk_id')->references('id')->on('varian_produk')->onDelete('cascade');
            $table->double('harga');
            $table->double('jumlah');
            $table->double('subtotal');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_penjualan');
    }
}
