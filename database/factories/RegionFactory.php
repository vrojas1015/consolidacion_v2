<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Region;
use Faker\Generator as Faker;

$factory->define(Region::class, function (Faker $faker) {

    return [
        'nombre' => $faker->word,
        'identificador' => $faker->word,
    ];
});
