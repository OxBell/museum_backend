<?php

use Illuminate\Database\Seeder;

class PhotosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        
        $galleries = App\Gallery::all();

        for($i = 0; $i < 10; $i++) {
            App\Photo::create([
                'gallery_id' => $galleries[$i]->id,
                'user_id' => $galleries[$i]->user->id,
                'name' => 'Photo ' . $faker->city,
                'description' => $faker->text(200),
                'path' => $faker->imageUrl(640480)
            ]);
        }
    }
}
