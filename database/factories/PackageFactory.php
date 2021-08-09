<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Package;
use Faker\Generator as Faker;

$factory->define(Package::class, function (Faker $faker) {
    return [
        'name' => $this->faker->name,
        'type' => 'client',
        'price' => $this->faker->numberBetween(10, 200),
        'number_of_days' => $this->faker->numberBetween(10, 200),
        'commission' => $this->faker->numberBetween(10, 200),
        'commission_type' => $this->faker->word,
    ];
});
