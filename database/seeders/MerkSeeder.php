<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Merk;

class MerkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Merk::create([
            'merk' => 'Asus'
        ]);
        Merk::create([
            'merk' => 'Lenovo'
        ]);
        Merk::create([
            'merk' => 'Samsung'
        ]);
    }
}
