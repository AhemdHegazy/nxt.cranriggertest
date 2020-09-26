<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=0;$i<15;$i++){
            \App\Post::create([
                'title'     =>'Subject '.$i,
                'description'     =>'Description '.$i,
                'slug'      =>'Subject '.$i,
                'featured'  =>'featured',
                'content'   =>'lorem ipsum',
                'subject_id'   =>rand(1,5)
            ]);
        }
    }
}
