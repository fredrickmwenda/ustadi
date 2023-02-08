<?php

namespace Database\Seeders;

use App\Models\Cordinator;
use App\Models\User;
use Hash;
use Illuminate\Database\Seeder;

class CoordinatorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Create a coordinator account through seeding
        $user = User::create([
            'name' => 'Coordinator Account',
            'email' => 'co@ustadi.com',
            'password' => Hash::make('password'),
        ]);

        Cordinator::create([
            'user_id' => $user->id,
        ]);
    }
}
