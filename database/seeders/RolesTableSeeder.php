<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name' => 'Superadmin',
            'menus' => json_encode([1, 2, 3, 4, 5, 6, 7]), // Replace with actual menu IDs
        ]);

        Role::create([
            'name' => 'User',
            'menus' => json_encode([1, 2, 3, 4, 5]), // Replace with actual menu IDs for User role
        ]);
    }
}
