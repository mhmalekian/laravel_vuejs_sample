<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Person::class, function (Faker $faker) {
    return [
        'first_nam' => $faker->firstName,
        'last_name' => $faker->lastName,
        'created_at' => null,
        'updated_at' => null

    ];

});
