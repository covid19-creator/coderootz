<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('menus')->insert([
            ['name' => 'Dashboard', 'route' => 'dashboard'],
            ['name' => 'Profile', 'route' => 'profile'],
            // Add more menus as needed
        ]);
    }
}
