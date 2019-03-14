<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds for users table.
     *
     * @return void
     */
    public function run()
    {
	    factory(App\User::class, 2)->create();
    }
}
