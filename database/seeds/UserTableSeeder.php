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
        DB::table('users')->insert([
            'name' => 'test',
            'email' => 'test@example.com',
            'password' => bcrypt('password'),
            'create_at' => Carbon::now(),
            'updated_at' => Carbon::now(),      
            ]);
    }
}
