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

$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Post::class, function (Faker\Generator $faker) {
    return [
        'user_id' => mt_rand(1, 29),
        'content' => $faker->paragraph,
        'votes' => mt_rand(1, 800),
    ];
});

$factory->define(App\Video::class, function (Faker\Generator $faker) {
    return [
        'user_id' => mt_rand(1, 29),
        'title' => $faker->title,
        'url' => $faker->url,
    ];
});

