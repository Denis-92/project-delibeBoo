<?php

use App\Resturant;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

use Illuminate\Support\Str;
use App\User;




class ResturantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $namerest = [
            'McDonalds',
            'BurgerKing',
            'PokeHouse',
            'Sushi Tao',
            'Pizzeria Napoli',
            'Gelateria Paradiso',
            'Vegghy Meal',
            'Trattoria Romana',
            'Pasticceria da Antonio',
            'Ristorante La Buona Cucina'
        ];
        $lunchopen = ['11:00', '11:30', '12:00'];
        $lunchclose = ['13:30', '14:00', '14:30'];
        $dinneropen = ['18:00', '18:30', '19:00'];
        $dinnerclose = ['21:30', '22:00', '22:30', '23:00'];
        for ($i = 0; $i < 10; $i++) {
            $resturant = new Resturant();
            $resturant->name = $namerest[$i];
            $resturant->address = $faker->streetAddress();
            $resturant->p_iva = $faker->regexify('[0-9]{11}');
            $resturant->lunch_opening = $lunchopen[array_rand($lunchopen)];
            $resturant->lunch_closing = $lunchclose[array_rand($lunchclose)];
            $resturant->dinner_opening = $dinneropen[array_rand($dinneropen)];
            $resturant->dinner_closing = $dinnerclose[array_rand($dinnerclose)];
            $slug = Str::slug($resturant->name);
            $slug_base = $slug;
            $existingslug = Resturant::where('slug', $slug)->first();
            $counter = 1;
            while ($existingslug) {
                $slug = $slug_base . '_' . $counter;
                $existingslug = $resturant::where('slug', $slug)->first();
                $counter++;
            }
            $resturant->slug = $slug;

            $resturant->save();
        }
    }
}
