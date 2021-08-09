<?php

use App\Models\Package;
use App\Models\Project;
use App\Models\UserProfile;
use App\Models\ProjectCategory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        // factory(Package::class, 3)->create();
        // factory(ProjectCategory::class, 3)->create();
        factory(Project::class, 3)->create();
        factory(UserProfile::class, 3)->create();
    }
}
