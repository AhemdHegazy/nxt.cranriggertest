<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
class QuestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {

        for($i=0;$i<40;$i++){
           $question = \App\Question::create([
               'question'       =>$faker->paragraph,
               'image'          =>null,
               'capacity_id'     =>rand(1,10)
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
