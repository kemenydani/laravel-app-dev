<?php

use Illuminate\Database\Seeder;
use App\Article;

class ArticleTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	
	    $faker = \Faker\Factory::create();
	    
	    foreach(range(1, 100) as $i){
		    Article::create([
			    'category_id' => $faker->numberBetween(1, 10),
			    'poster_user_id' => $faker->numberBetween(1, 100),
			    'title' => $faker->title,
			    'teaser' => $faker->sentence,
			    'content' => $faker->realText(1000)
		    ]);
	    }
    }
}
