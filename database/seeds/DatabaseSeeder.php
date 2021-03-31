<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CardsCategoriasSeeder::class);
        $this->call(ForumTiposSeeder::class);
        $this->call(ValidacaoRoboTraducaoSeeder::class);
        $this->call(ValidacaoRoboTextSeeder::class);
    }
}
