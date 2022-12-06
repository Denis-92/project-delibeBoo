<?php

use Illuminate\Database\Seeder;
use App\User;
use Faker\Generator as Faker;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 10; $i++) {
            $user = new User();
            $user->name = $faker->name();
            $user->email = preg_replace('/@example\..*/', '@domain.com', $faker->unique()->safeEmail);
            $user->password = $faker->password();
            $user->save();
        }
    }
}
