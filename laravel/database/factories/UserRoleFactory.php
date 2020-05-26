<?php

/** @var Illuminate\Database\Eloquent\Factory $factory */

use App\Models\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use App\Models\UserRole;

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

$factory->define(UserRole::class, function (Faker $faker) {

    return [
        'user_id'=>$faker->numberBetween(1,50),
        'role_id' => $faker->numberBetween(2,4)
    ];
});
