<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Merk extends Model
{
    use HasFactory;

    protected $table = 'merk';

    protected $fillable = [
        'merk'
    ];
    
    public function barang(){
        return $this->hasMany(Barang::class, 'id', 'id_merk');
}
}
