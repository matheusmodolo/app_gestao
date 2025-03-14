<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Cliente;
use App\Pedido;

use Faker\Generator as Faker;

$factory->define(Pedido::class, function (Faker $faker) {
    $clientes_id = Cliente::pluck('id')->toArray();
    return [
        'cliente_id' => $faker->randomElement($clientes_id)
    ];
});
