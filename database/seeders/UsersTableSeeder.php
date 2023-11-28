<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name'        => 'Admin',
            'email'             => 'admin@gmail.com',
            'phone'             => '01958457547',
            'password'          => bcrypt('12345678'),
            'last_period_date'          => '12/11/2021',
            'created_at'        => date("Y-m-d H:i:s"),
            'email_verified_at' => date("Y-m-d H:i:s"),
        ]);
    }
}
