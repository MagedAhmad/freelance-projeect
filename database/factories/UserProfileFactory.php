<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use App\Models\Package;
use App\Models\UserProfile;
use Faker\Generator as Faker;

$factory->define(UserProfile::class, function (Faker $faker) {
    return [
        'user_id' => factory(User::class)->create(),
        'bio' => $this->faker->paragraph,
    ];
});
