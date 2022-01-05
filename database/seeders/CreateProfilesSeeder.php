<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\models\Profile;

class CreateProfilesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Profile::create ([
                'nama' => 'Muhammad Rifqi Alfauzan',
                'nip' => '12532132232',
                'foto_profile' => 'assets/img/undraw_profile.svg'
            ]);
        Profile::create ([
                'nama' => 'Jyawijaya',
                'nip' => '378474494',
                'foto_profile' => 'assets/img/undraw_profile.svg'
            ]);
        
    }
}
