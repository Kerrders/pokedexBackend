<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEvolutionTriggerProseTable extends Migration
{
    public function up()
    {
        Schema::create('evolution_trigger_prose', function (Blueprint $table) {
            $table->integer('evolution_trigger_id')->nullable();
            $table->integer('local_language_id')->nullable();
            $table->text('name')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('evolution_trigger_prose');
    }
}
