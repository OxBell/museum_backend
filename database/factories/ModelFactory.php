<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Gallery::class, function($faker) {
    return [
        'user_id' => function () {
                return factory(App\User::class)->create()->id;
        },
        'name' => $faker->word,
        'description' => $faker->text(255)
    ];
});

$factory->define(App\Photo::class, function($faker) {
    return [
        'gallery_id' => function () {
                return factory(App\Gallery::class)->create()->id;
        },
        'user_id' => function () {
                return factory(App\User::class)->create()->id;
        },
        'name' => $faker->word,
        'description' => $faker->text(255),
        'path' => $faker->imageUrl(640, 480)
    ];
});
