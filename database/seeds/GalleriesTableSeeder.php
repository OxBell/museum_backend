<?php

use Illuminate\Database\Seeder;

class GalleriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $users = App\User::all();

        for($i = 0; $i < 10; $i++) {
            App\Gallery::create([
                'user_id' => $users[$i]->id,
                'name' => $faker->city,
                'description' => $faker->text(200),
            ]);
        }
    }
}
