<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Bank\Account::class, function (Faker $faker) {
    return [
        'account_type_id' => function () {
            return factory(\App\Models\Bank\AccountType::class)->create()->id;
        },
        'iban'      => $faker->unique()->iban(),
        'bic'       => $faker->swiftBicNumber,
        'bank_name' => $faker->name(),
    ];
});
