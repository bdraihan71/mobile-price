<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => "Raihan Farhad",
            'email' => "bdraihan71@gmail.com",
            'password' => Hash::make('BANgladesh_raihan_007#'),
        ]);
    }
}
