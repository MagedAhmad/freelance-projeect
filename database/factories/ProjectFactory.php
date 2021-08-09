<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use App\Models\Project;
use Faker\Generator as Faker;
use App\Models\ProjectCategory;

$factory->define(Project::class, function (Faker $faker) {
    return [
        'project_category_id' => factory(ProjectCategory::class)->create(),
        'type' => 'f',
        'client_user_id' => factory(User::class)->create(),
        'name' => $this->faker->name,
        'excerpt' => $this->faker->paragraph,
        'description' => $this->faker->paragraph,
        'price' => $this->faker->numberBetween(10, 200),
        'slug' => $this->faker->slug,
    ];
});
