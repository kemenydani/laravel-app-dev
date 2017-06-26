<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoryTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	    $faker = \Faker\Factory::create();
	
	    foreach(range(1, 10) as $i){
		    Category::create([
			    'name' => $faker->word
		    ]);
	    }
	    
    }
}
