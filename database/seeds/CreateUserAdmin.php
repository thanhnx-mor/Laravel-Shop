<?php

use Illuminate\Database\Seeder;

class CreateUserAdmin extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'thanhnx',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin')
        ]);
    }
}
