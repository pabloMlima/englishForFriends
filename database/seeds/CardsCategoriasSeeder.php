<?php

use Illuminate\Database\Seeder;

class CardsCategoriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cards_categorias')->insert([
            'car_cat_nome' => 'Text ',
        ]);
        DB::table('cards_categorias')->insert([
            'car_cat_nome' => 'Image ',
        ]);
    }
}
