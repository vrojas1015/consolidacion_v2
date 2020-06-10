<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Gerente;
use Faker\Generator as Faker;

$factory->define(Gerente::class, function (Faker $faker) {

    return [
        'id_proyecto' => $faker->word,
        'nombre' => $faker->word,
        'email' => $faker->word,
        'password' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'deleted_at' => $faker->date('Y-m-d H:i:s')
    ];
});
