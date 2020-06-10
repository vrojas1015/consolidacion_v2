<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Operacion;
use Faker\Generator as Faker;

$factory->define(Operacion::class, function (Faker $faker) {

    return [
        'id_proyecto' => $faker->word,
        'dia' => $faker->randomDigitNotNull,
        'no_operaciones' => $faker->randomDigitNotNull,
        'ano' => $faker->randomDigitNotNull,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'deleted_at' => $faker->date('Y-m-d H:i:s')
    ];
});
