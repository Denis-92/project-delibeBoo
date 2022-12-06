<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Order;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker){
        for ($i = 0; $i < 20; $i++){
            $order = New Order();
            $order->total_price = $faker->randomFloat(2, 1, 999);
            $order->date = $faker->date();
            $order->address = $faker->streetAddress();
            $order->pieces = $faker->numberBetween(1, 10);
            $order->email = preg_replace('/@example\..*/', '@domain.com', $faker->unique()->safeEmail);
            $order->phone_number = $faker->phoneNumber();
            $order->save();
        }
    }
}
