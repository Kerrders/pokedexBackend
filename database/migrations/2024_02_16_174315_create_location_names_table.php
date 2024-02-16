<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('location_names', function (Blueprint $table) {
            $table->integer('location_id')->nullable();
            $table->integer('local_language_id')->nullable();
            $table->string('name')->nullable();
            $table->string('subtitle')->nullable();
        });

        Schema::table('location_names', function (Blueprint $table) {
            $table->index('location_id');
            $table->index('local_language_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('location_names');
        Schema::table('location_names', function (Blueprint $table) {
            $table->dropIndex(['location_id']);
            $table->dropIndex(['local_language_id']);
        });
    }
};
