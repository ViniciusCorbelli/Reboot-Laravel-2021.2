<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Categorias;
use App\Produtos;
use Faker\Generator as Faker;

$factory->define(Produtos::class, function (Faker $faker) {

    $categorias_id = Categorias::all()->pluck('id')->toArray();
    $random_key = array_rand($categorias_id);

    return [
        'nome' => $faker->word,
        'preco' => $faker->randomFloat($nbMaxDecimals = 2, $min = 10, $max = 1000),
        'categoria_id' => $categorias_id[$random_key],
    ];
});
