<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'username' => $faker->word,
        'password' => $password ?: $password = bcrypt('123456'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Cliente::class, function (Faker\Generator $faker) {
    

    return [
        'nome' => $faker->name,
        'telefone' => $faker->phoneNumber,
        'endereco' => $faker->address,
    ];
});

$factory->define(App\Produto::class, function (Faker\Generator $faker) {
    

    return [
        'descricao' => $faker->word,
        'valor_compra' => $faker->randomFloat(2, 30,100),
        'valor_venda' => $faker->randomFloat(2, 30,100),
        'estoque' => $faker->numberBetween(10,1000),
    ];
});
