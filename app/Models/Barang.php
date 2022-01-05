<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $table = 'barang';

    protected $fillable = [
        'kode_barang',
        'nama',
        'id_merk',
        'kuantitas'
    ];

    public function merk()
    {
        return $this->belongsTo(Merk::class, 'id_merk', 'id');
    }
    public function transaksi()
    {
        return $this->hasOne(Transaksi::class, 'id_barang');
    }
}