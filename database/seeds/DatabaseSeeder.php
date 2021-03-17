<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
       
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'info@trailanalytics.com',
            'password' => bcrypt('admin'),
            'role' => 'admin',
            'created_at' => date('d,m,y,h,i,s')
        ]); 

       
    }
}
