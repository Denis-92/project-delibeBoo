<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tipologie = [
            'italiano', 'pizza', 'hamburgher', 'messicano', 'sushi', 'american style', 'giapponese', 'vegetariano', 'vegano', 'pasta', 'carne', 'pesce', 'kebab', 'gelato', 'colazioni', 'poke', 'dolci', 'indiano'
        ];
        foreach ($tipologie as $type) {
            $category = new Category();
            $category->nome = $type;
            $category->save();
        }
    }
}
