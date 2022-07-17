<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the user seeder.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insertOrIgnore([
            'login' => 'test',
            'password' => Hash::make('password'),
        ]);
    }
}
