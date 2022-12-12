<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Plate;

use Illuminate\Support\Str;
// use App\Resturant;

class PlateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        //

        for ($i = 0; $i < 100; $i++) {
            $plate = new Plate();
            $plate->name = $faker->word();
            $plate->description = $faker->text();
            $plate->price = $faker->randomFloat(2, 0, 50);
            $plate->hidden = $faker->boolean();

            $slug = Str::slug($plate->name);
            $slug_base = $slug;
            $existingslug = Plate::where('slug', $slug)->first();
            $counter = 1;
            while ($existingslug) {
                $slug = $slug_base . '_' . $counter;
                $existingslug = $plate::where('slug', $slug)->first();
                $counter++;
            }
            $plate->slug = $slug;
            $plate->resturant_id = rand(1, 10);
            $plate->save();
        }
    }
}
