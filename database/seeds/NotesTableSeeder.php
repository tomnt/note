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
        for ($i = 0; $i < 1000; $i++) {
            $note = new \App\Note();
            //$note->user_id = $cUser[rand(0,count($cUser)-1)]->user_id;
            $note->user_id = $cUser[rand(0,count($cUser)-1)]->id;
            $note->title = $faker->realText(rand(10, 50));
            $note->note = $faker->realText(rand(10, 1000));
            $note->save();
        }
    }
}
