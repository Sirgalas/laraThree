<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Post;
use Faker\Generator as Faker;

$factory->define(Post::class,function (Faker $faker){
    return [
        'title'=> $faker->sentence(3),
        'desc'=>$faker->paragraph(5),
        'user_id'=>$faker->numberBetween(1,50),
        'is_moderate'=>$faker->boolean,
        'created_at' => now(),
        'updated_at' => now(),
        'file_id'=>$faker->numberBetween(1,50),
    ];
});
