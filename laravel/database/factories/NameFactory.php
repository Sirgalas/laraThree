<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Name;
use Faker\Generator as Faker;

$factory->define(Name::class,function (Faker $faker){
   return [
       'first_name'=>$faker->firstName,
        'second_name'=>$faker->firstName('male'),
       'family'=>$faker->lastName,
       'user_id'=>$faker->unique()->numberBetween(1,50),
       'created_at' => now(),
       'updated_at' => now(),
   ];
});
