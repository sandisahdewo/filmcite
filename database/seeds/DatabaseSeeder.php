<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(FilmTableSeeder::class);
        $this->call(PeopleTableSeeder::class);
    }
}
