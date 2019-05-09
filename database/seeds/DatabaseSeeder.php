<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('es_ES');
        foreach(range(1,100) as $index){
        	DB::table('personas')->insert([
        		'nombre' => $faker->name,
        		'apellido' => $faker->lastname,
        		'edad' => $faker->numberBetween(1,100),
        		'dni' => $faker->randomNumber(8),
        	]);
        }
    }
}
