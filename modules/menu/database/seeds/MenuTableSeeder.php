<?php

use Illuminate\Database\Seeder;

use Carbon\Carbon;

/**
 * Class MenuTableSeeder
 */
class MenuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('menus')->insert([
            [
                'id' => 1,
                'name' => 'Admin menu',
                'permalink' => 'admin-menu',
                'kind'  => 'backend',
                'status' => true,
                'deleted_at' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 2,
                'name' => 'Main menu',
                'permalink' => 'main-menu',
                'kind'  => 'frontend',
                'status' => true,
                'deleted_at' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ]);
    }
}