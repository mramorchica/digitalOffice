<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	User::insert([
    		[
    			'name' => 'Admin One',
	    		'email' => 'admin@mdo.com',
                'phone' => '0888 123 456',
	    		'password' => bcrypt('pass1234'),
                'position_id' => 1,
                'department_id' => 1,
    		]	
    	]);
    }
}
