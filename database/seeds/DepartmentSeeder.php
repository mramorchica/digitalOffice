<?php

use App\Models\Department;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Department::insert([
        	[
        		'name' => 'Accounting'
        	],
        	[
        		'name' => 'Business Development'
        	],
        	[
        		'name' => 'Software Development'
        	],
        	[
        		'name' => 'Marketing'
        	],
        	[
        		'name' => 'Design'
        	],
        ]);
    }
}
