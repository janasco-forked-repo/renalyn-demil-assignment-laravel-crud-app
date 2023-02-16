<?php


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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
        // \App\Models\User::factory(10)->create();
        $faker = Faker::create();
        $gender = $faker->randomElement(['male', 'female']);
        foreach (range(1,200) as $index) {
            DB::table('planets')->insert([
                'name' => $faker->name,
                'discovery_year' => $faker->text,
                'distance_from_sun' => $faker->text,
                'surface_area' => $faker->text,
                'rotation_period' => $faker->text,
                'number_of_moons' => $faker->text
            ]);
        }
    }
} 

 