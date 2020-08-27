<?php

use Illuminate\Database\Seeder;

class QuestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        for($i=0;$i<40;$i++){
           $question = \App\Question::create([
               'question'       =>'this is question',
               'image'          =>null,
               'subject_id'     =>rand(1,5)
           ]);

            \App\Option::create([
                'option'        =>'option 1'.$i,
                'true'       => 1,
                'question_id'   =>$question->id
            ]);

            \App\Option::create([
                'option'        =>'option 2'.$i,
                'true'       => 0,
                'question_id'   =>$question->id
            ]);

            \App\Option::create([
                'option'        =>'option 3'.$i,
                'true'       => 0,
                'question_id'   =>$question->id
            ]);

            \App\Option::create([
                'option'        =>'option 4'.$i,
                'true'       => 0,
                'question_id'   =>$question->id
            ]);

        }
    }
}
