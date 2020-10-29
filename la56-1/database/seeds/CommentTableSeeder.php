<?php

use Illuminate\Database\Seeder;

class CommentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('comment')->insert([
            [
                'comment'=>'梵蒂冈电饭锅',
                'article_id'=>rand(1,3)
            ],[
                'comment'=>'芳华',
                'article_id'=>rand(1,3)
            ],[
                'comment'=>'哈哈哈哈哈',
                'article_id'=>rand(1,3)
            ],[
                'comment'=>'防守打法都市丰收',
                'article_id'=>rand(1,3)
            ],
        ]);
    }
}
