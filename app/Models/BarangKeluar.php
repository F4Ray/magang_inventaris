<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangKeluar extends Model
{
    protected $table = 'barang_keluar';

    protected $fillable = [
        'kode_barang',
        'nama',
        'nama_peminjam',
        'id_merk',
        'kuantitas',
        'disable'
    ];

    public function merk()
    {
        return $this->belongsTo(Merk::class, 'id_merk', 'id');
    }
}