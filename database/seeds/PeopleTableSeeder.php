<?php

use App\Movie\People;
use Illuminate\Database\Seeder;

class PeopleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $path = database_path('people/data');

        if (File::exists($path)) {
            $people = explode("\n", File::get($path));

            foreach ($people as $json) {
                $person = json_decode($json);

                $model = People::firstOrNew(['name' => $person->name]);

                $model->person_id = $person->id;
                $model->popularity = $person->popularity;
                $model->save();
            }
        }
    }
}
