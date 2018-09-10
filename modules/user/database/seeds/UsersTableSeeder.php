<?php

use Illuminate\Database\Seeder;

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
            'first_name'    => 'Hoa',
            'last_name'     => 'Trinh Quoc',
            'full_name'     => 'Trinh Quoc Hoa',
            'email'         => 'tqhoa8th@gmail.com',
            'password'      => bcrypt('123456'),
            'created_at'    => new DateTime,
        ]);
    }
}