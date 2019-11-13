<?php

use Illuminate\Database\Seeder;

class NotesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('en_US');
        $cUser = \App\User::all();
        for ($i = 0; $i < 100; $i++) {
            $note = new \App\Note();
            $note->user_id = $cUser[rand(0,count($cUser)-1)]->id;
            $note->title = $faker->realText(50);
            $note->note = $faker->realText(1000);
            $note->save();
        }
    }
}
