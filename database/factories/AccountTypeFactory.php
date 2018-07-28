<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Bank\AccountType::class, function (Faker $faker) {
    return [
        'name'          => $faker->name(),
        'description'   => $faker->text(),
        'is_commercial' => $faker->boolean(),
    ];
});
