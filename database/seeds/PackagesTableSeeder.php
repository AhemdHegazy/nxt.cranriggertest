<?php

use Illuminate\Database\Seeder;

class PackagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=0;$i<5;$i++){
            \App\Package::create([
                'name'      =>'Package '.$i,
                'type'      =>rand(0,1),
                'price'     =>rand(10,50),
                'questions' =>rand(10,50),
                'minute'     =>rand(10,50),
                'add_minute'  =>rand(10,50),
                'add_price'  =>rand(10,50),
                'subject_id'   =>rand(1,5)
            ]);
        }

    }
}
