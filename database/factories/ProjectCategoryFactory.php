<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\ProjectCategory;
use Faker\Generator as Faker;

$factory->define(ProjectCategory::class, function (Faker $faker) {
    return [
        'name' => $this->faker->name,
        'slug' => $this->faker->slug,
    ];
});
