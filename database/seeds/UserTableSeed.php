<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
	public function run()
	{
		$faker = \Faker\Factory::create();
		//Hard reset table
		//User::truncate();
		
		User::create([
			'name' => 'snowy',
			'email' => 'kemenydani93@gmail.com',
			'country_id' => 'HU',
			'password' => Hash::make('admin')
		]);
		
		foreach(range(1, 1000) as $i){
			User::create([
				'name' => $faker->userName,
				'email' => $faker->email,
				'country_id' => $faker->countryCode,
				'password' => Hash::make('apple')
			]);
		}
	}
}
