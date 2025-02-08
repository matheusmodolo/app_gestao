<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Produto;
use App\Unidade;
use Faker\Generator as Faker;

$factory->define(Produto::class, function (Faker $faker) {
    
    $unidades = Unidade::all()->pluck('id')->toArray();

    return [
        'nome' => $faker->word(),
        'descricao' => $faker->sentence(3),
        'peso' => $faker->umberBetween(1, 10),
        'unidade_id' => $faker->randomElement($unidades)
    ];
});
