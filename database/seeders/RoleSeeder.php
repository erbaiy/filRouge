<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            ['id' => 1, 'name' => 'Admin'],
            ['id' => 17, 'name' => 'User'],
        ];

        // Inserting roles into the database
        DB::table('role')->insert($roles);
    }
}
