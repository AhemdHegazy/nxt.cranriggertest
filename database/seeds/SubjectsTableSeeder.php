<?php

use Illuminate\Database\Seeder;

class SubjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=0;$i<5;$i++){
            \App\Subject::create([
                'name'       =>'Subject '.$i,
                'description'=>'this is description for subject '.$i
            ]);
        }
    }
}
