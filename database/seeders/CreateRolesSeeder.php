<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\models\Role;

class CreateRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create ([
            
                'role' => 'admin',
        ]);
        
        Role::create([
                'role' => 'user',
        ]);
        
    }
}
