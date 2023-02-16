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
            DB::table('iphones')->insert([
                'model' => $faker->name,
                'released' => $faker->text,
                'discontinued' => $faker->text,
                'capacities' => $faker->text,
                'processor' => $faker->text,
                'os' => $faker->text
            ]);
        }
    }
} 