<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(AdminTableSeeder::class);
         $this->call(SubjectsTableSeeder::class);
         $this->call(CapacitiesTableSeeder::class);
         $this->call(QuestionsTableSeeder::class);
         $this->call(PackagesTableSeeder::class);
         $this->call(PostsTableSeeder::class);
    }
}
