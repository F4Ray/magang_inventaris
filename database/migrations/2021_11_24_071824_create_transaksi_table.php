<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('id_jenis_transaksi')->constrained('jenis_transaksi');
            $table->bigInteger('id_barang');
            // $table->foreignId('id_barang')->constrained('barang');
            $table->foreignId('id_user')->constrained('users');

            $table->integer('kuantitas');
            $table->string('nama_peminjam');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksi');
    }
}