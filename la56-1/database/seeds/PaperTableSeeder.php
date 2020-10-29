<?php

use Illuminate\Database\Seeder;

class PaperTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data=[
            [
                'paper_name'=>'五年高考,三年模拟',
                'start_time'=>strtotime('+7 days'),
                'duration'=>'120,'
            ],
            [
                'paper_name'=>'黄冈密卷',
                'start_time'=>strtotime('+5 days'),
                'duration'=>'120,'
            ],
            [
                'paper_name'=>'衡水中学期中考试卷',
                'start_time'=>strtotime('+10 days'),
                'duration'=>'120,'
            ]
        ];
        DB::table('paper')->insert($data);
    }
}
