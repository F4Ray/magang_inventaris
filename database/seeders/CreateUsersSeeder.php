<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class CreateUsersSeeder extends Seeder
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
                'id_role'=>'2', //user
                'id_profiles'=>'1', //rifqi
                'email'=>'admin@brightfuture.can',
                'password'=> bcrypt('123456'),
            ],
            [
                'id_role'=>'1', //admin
                'id_profiles'=>'2', //jyawijaya
                'email'=>'user@brightfuture.can',
                'password'=> bcrypt('123456'),
            ],
        ];

        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
