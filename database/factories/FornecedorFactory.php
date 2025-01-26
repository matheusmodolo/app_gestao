<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Fornecedor;
use Faker\Generator as Faker;

$factory->define(Fornecedor::class, function (Faker $faker) {
    return [
        'nome' => $faker->company,
        'site' => $faker->domainName,
        'email' => $faker->unique()->email,
        'uf' => $faker->countryCode,
    ];
});
