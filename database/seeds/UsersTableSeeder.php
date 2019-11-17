<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('en_US');
        for ($i = 0; $i < 100; $i++) {
            $user = new \App\User();
            $user->name = $faker->name;
            $user->email = $faker->email;
            $user->password = $faker->password(8);
            try{
                $user->save();
            }catch(\Exception $e){
                $i--;
                $e->getMessage().PHP_EOL;
            }
        }
    }
}
