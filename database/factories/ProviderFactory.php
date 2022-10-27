<?php

use Faker\Generator as Faker;

$factory->define(App\Provider::class, function (Faker $faker) {
    return [
        'name' => $faker->name(),
        'phone' => $faker->phoneNumber(),
        'location' => $faker->address(),
        'user_name' => $faker->name(),
        'password' => bcrypt('123456'),
    ];
});
