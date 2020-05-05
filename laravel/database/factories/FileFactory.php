<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\File;
use Faker\Generator as Faker;

$factory->define(File::class,function (Faker $faker){
    return [
        'path'=> $faker->imageUrl(800,600,'abstract',true,null,true),
        'created_at' => now(),
        'updated_at' => now(),
    ];
});
