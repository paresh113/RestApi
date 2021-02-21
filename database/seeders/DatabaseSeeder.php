<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach(range(1,10) as $index){
            DB::table('Products')->insert([
                'title' => $faker->name,
                'details' => $faker->text(400)
            ]);
        }

        // \App\Models\User::factory(10)->create();
    }
}
