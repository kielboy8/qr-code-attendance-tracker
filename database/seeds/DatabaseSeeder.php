<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('users')->insert([
        	'name' => 'Admin',
        	'email' => 'admin@fourptzero.com',
        	'password' => bcrypt('password')
        ]);

        factory(App\Employee::class, 10)->create();
    }
}
