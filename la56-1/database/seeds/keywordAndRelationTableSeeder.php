<?php

use Illuminate\Database\Seeder;

class keywordAndRelationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('keyword')->insert([
            ['keyword'=>'芳华'],
            ['keyword'=>'冯小刚'],
            ['keyword'=>'老炮儿'],
            ['keyword'=>'导演'],
        ]);
        DB::table('relation')->insert([
            [
                'article_id'=>rand(1,3),
                'key_id'=>rand(1,4)
            ],[
                'article_id'=>rand(1,3),
                'key_id'=>rand(1,4)
            ],[
                'article_id'=>rand(1,3),
                'key_id'=>rand(1,4)
            ],[
                'article_id'=>rand(1,3),
                'key_id'=>rand(1,4)
            ],
        ]);
    }
}
