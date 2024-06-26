<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('reptiles', function (Blueprint $table) {
            //
            $table->string('habitat')->nullable();
            $table->string('length')->nullable();
            $table->string('lifespan')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('reptiles', function (Blueprint $table) {
            //
        });
    }
};
