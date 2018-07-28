<?php

use Faker\Generator as Faker;
use Ngsoft\User;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'lastname' => $faker->lastName,
        'email' => $faker->unique()->safeEmail,
        'username' => $faker->unique()->userName,
        'password' => 'secret', // secret
        'remember_token' => str_random(10),
        'type' => $faker->randomElement(['docente','coordinador','secretaria']),
    ];
});