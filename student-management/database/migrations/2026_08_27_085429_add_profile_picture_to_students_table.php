<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Add the profile_picture column to the students table.
     */
    public function up(): void
    {
        Schema::table('students', function (Blueprint $table) {
            $table->string('profile_picture')
                ->nullable()
                ->after('course');
        });
    }
    /**
     * Remove the profile_picture column if the migration is reversed.
     */
    public function down(): void
    {
        Schema::table('students', function (Blueprint $table) {
            $table->dropColumn('profile_picture');
        });
    }
};
