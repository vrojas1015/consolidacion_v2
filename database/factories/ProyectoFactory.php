<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Proyecto;
use Faker\Generator as Faker;

$factory->define(Proyecto::class, function (Faker $faker) {

    return [
        'id_region' => rand(1,4),
        'nombre' => $faker->word,
    ];
});
