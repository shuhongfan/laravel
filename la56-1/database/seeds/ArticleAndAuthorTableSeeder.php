<?php

use Illuminate\Database\Seeder;

class ArticleAndAuthorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('article')->insert([
            [
                'article_name'=>'我有很多笑话你要吗',
                'author_id'=>rand(1,3)
            ],
            [
                'article_name'=>'丢到也不给你',
                'author_id'=>rand(1,3)
            ],
            [
                'article_name'=>'嫌多了',
                'author_id'=>rand(1,3)
            ]
        ]);
        DB::table('author')->insert([
            [
                'author_name'=>'人民网'
            ],
            [
                'author_name'=>'腾讯'
            ],
            [
                'author_name'=>'网易'
            ]
        ]);
    }
}
