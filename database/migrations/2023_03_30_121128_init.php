<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (!Schema::hasTable('activities')) {
            Schema::create("activities", function (Blueprint $table) {
                $table->id();
                $table->string("name");
                $table->string("description");
                $table->time("duration");
                
            });
        }

        if (!Schema::hasTable('users')) {
            Schema::create("users", function (Blueprint $table) {
                $table->id();
                $table->string("name");
                $table->string("email");
            });
        }

        if (!Schema::hasTable('activity_data')) {
            Schema::create("activity_data", function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger("user_id");
                $table->unsignedBigInteger("activity_id");
                $table->time("point_in_time");
                $table->double("speed");
            });
        }

        // Add new fields 
        if (!Schema::hasColumn('activities', 'created')) {
            Schema::table('activities', function (Blueprint $table) {
                $table->timestamp("created")->default(DB::raw('CURRENT_TIMESTAMP'));;
                $table->timestamp("edited")->default(DB::raw('CURRENT_TIMESTAMP'));;
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop("activities");
        Schema::drop("users");
    }
};
