<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClubSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //use Faker to generate fake club data
        $faker = \Faker\Factory::create();
        //create 20 clubs
        for ($i = 0; $i < 20; $i++) {
            $club = new \App\Models\Club();
            $club->club_name = $faker->company;
            $club->description = $faker->text;
            $club->created_by = 1;
            $club->logo = $faker->imageUrl($width = 640, $height = 480);
            $club->save();
        }
    }
}
