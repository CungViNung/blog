<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => 'NitroZeus',
                'email' => 'leduchuy1911@gmail.com',
                'password' => bcrypt('Bomanhpro1'),
                'role' => 'admin'
            ],
            [
                'name' => 'VioletStarr',
                'email' => 'omfg@gmail.com',
                'password' => bcrypt('123456'),
                'role' => 'author'
            ],
        ];

        DB::table('users')->insert($data);
    }
}
