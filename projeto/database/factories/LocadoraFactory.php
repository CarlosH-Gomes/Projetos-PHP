<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Locadora;
use Faker\Generator as Faker;

$factory->define(Locadora::class, function (Faker $faker) {
    
    $gender = $faker->randomElement(['M', 'F']);

    return [
        'nome' => $faker->name,
        'CPF' => $faker->creditCardNumber,
        'RG' => $faker->creditCardNumber,
        'sexo' => $gender,
        'Data_Nasci' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'Telefone' => $faker->tollFreePhoneNumber,
        'email' => $faker->tollFreePhoneNumber,
    ];
});
