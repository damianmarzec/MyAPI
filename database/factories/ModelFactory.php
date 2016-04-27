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
    return [
        'name' => $faker->name,
        //'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
            'token' => bcrypt(str_random(10)),
            'alive' => rand(0,1) === 1,
        'remember_token' => str_random(10),
            'latitude' => $faker->latitude(-90, 90),
            'longitude' => $faker->longitude(-180, 180)
    ];
});
