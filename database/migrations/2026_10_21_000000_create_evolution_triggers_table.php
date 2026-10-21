<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEvolutionTriggersTable extends Migration
{
    public function up()
    {
        Schema::create('evolution_triggers', function (Blueprint $table) {
            $table->integer('id')->nullable();
            $table->string('identifier')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('evolution_triggers');
    }
}
