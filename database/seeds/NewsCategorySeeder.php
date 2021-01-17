<?php

use Illuminate\Database\Seeder;
use App\Models\NewsCategory;

class NewsCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        NewsCategory::insert([
        	[
        		'category_name' => 'Corporate'
        	],
        	[
        		'category_name' => 'Team'
        	],
        	[
        		'category_name' => 'Clients'
        	],
        	[
        		'category_name' => 'Interesting'
        	],
        	[
        		'category_name' => 'CSR'
        	],
        	[
        		'category_name' => 'Teambuilding activities'
        	],        	
	    ]);
    }
}
