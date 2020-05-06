<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'user_1',
            'email' => 'user_1@example.com',
            'password' => bcrypt('ghbdtnbr'),
            'is_admin' => 0,
        ]);
    }
}
