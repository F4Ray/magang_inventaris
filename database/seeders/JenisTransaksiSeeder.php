<?php

namespace Database\Seeders;

use App\Models\JenisTransaksi;
use Illuminate\Database\Seeder;

class JenisTransaksiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'jenis_transaksi' => 'Penambahan'

            ],
            [
                'jenis_transaksi' => 'Pengembalian'

            ],
            [
                'jenis_transaksi' => 'Peminjaman'

            ],
            [
                'jenis_transaksi' => 'Barang Rusak'

            ]
        ];
        foreach ($user as $key => $value) {
            JenisTransaksi::create($value);
        }
    }
}