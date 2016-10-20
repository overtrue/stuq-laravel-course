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
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});


$factory->define(App\Book::class, function (Faker\Generator $faker) {

    $covers = [
        'rBEhV1HadgAIAAAAAATW2Yw56eMAAA3tgNqNucABNbx081.jpg',
        'rBEhV1I38YQIAAAAAAJ5G7BZzBoAADR6wCEHAcAAnkz594.jpg',
        'rBEHZlCaNN4IAAAAAACR4LgiyasAACtigGA56oAAJH4268.jpg',
        'rBEQWFF00eMIAAAAAADX132P3PkAAEqmABYSIQAANfv613.jpg',
        '56a9b076N32114ac9.jpg',
        '566f6376Nf2a96677.jpg',
        '567bc9f8Nfc5e6109.jpg',
        'f31cd8be-7b93-48c4-9765-9b3fd229d268.jpg'
    ];

    return [
        'title' => $faker->sentence($nbWords = 6, $variableNbWords = true),
        'category_id' => mt_rand(1, 4),
        'author' => $faker->name,
        'cover' => $covers[mt_rand(0, 7)],
        'content' => $faker->paragraph($nbSentences = 3, $variableNbSentences = true),
    ];
});

