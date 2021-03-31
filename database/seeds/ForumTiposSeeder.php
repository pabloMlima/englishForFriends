<?php

use Illuminate\Database\Seeder;

class ForumTiposSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('forum_tipos')->insert([
            'for_tip_nome' => 'Cards',
        ]);
        DB::table('forum_tipos')->insert([
            'for_tip_nome' => 'Expressions',
        ]);
        DB::table('forum_tipos')->insert([
            'for_tip_nome' => ' Phrasal verbs ',
        ]);
        DB::table('forum_tipos')->insert([
            'for_tip_nome' => 'Podcasts',
        ]);
        DB::table('forum_tipos')->insert([
            'for_tip_nome' => 'Youtube ',
        ]);
        DB::table('forum_tipos')->insert([
            'for_tip_nome' => 'Text',
        ]);
        DB::table('forum_tipos')->insert([
            'for_tip_nome' => 'Tips',
        ]);
    }
}
