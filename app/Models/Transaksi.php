<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = 'transaksi';

    protected $fillable = [
        'id_jenis_transaksi',
        'id_barang',
        'id_user',
        'kuantitas',
        'nama_peminjam'
    ];


    public function barang()
    {
        return $this->belongsTo(Barang::class, 'id_barang');
    }
    public function jenis_transaksi()
    {
        return $this->belongsTo(JenisTransaksi::class, 'id_jenis_transaksi', 'id');
    }
}