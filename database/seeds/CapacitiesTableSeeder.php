<?php

use Illuminate\Database\Seeder;

class CapacitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=0;$i<10;$i++){
            \App\Capacity::create([
                'name'          =>'capacity '.$i,
                'description'   =>'this is description for capacity '.$i,
                'subject_id'    =>rand(1,4)
            ]);
        }
    }
}
