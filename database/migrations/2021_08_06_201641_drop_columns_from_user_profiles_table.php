<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropColumnsFromUserProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasColumn('user_profiles', 'package_id')) {
            $table->dropColumn('package_id');
        }

        if (Schema::hasColumn('user_profiles', 'package_invalid_at')) {
            $table->dropColumn('package_invalid_at');
        }
    }
}
