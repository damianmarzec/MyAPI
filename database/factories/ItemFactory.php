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

$factory->define(App\Item::class, function (Faker\Generator $faker) {
    $userIds = DB::table('users')->select('id')->take(50)->get();
    return [
        'description' => $faker->name,
        'active' => rand(0,1) === 1,
        'latitude' => $faker->latitude(-90, 90),
        'longitude' => $faker->longitude(-180, 180),
        'giver_id' => $userIds[array_rand($userIds)]->id,
        'taker_id' => $userIds[array_rand($userIds)]->id,
    ];
});
