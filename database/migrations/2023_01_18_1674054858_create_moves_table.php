<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMovesTable extends Migration
{
    public function up()
    {
        Schema::create('moves', function (Blueprint $table) {
            $table->integer('id')->nullable();
            $table->text('identifier');
            $table->integer('generation_id')->nullable();
            $table->integer('type_id')->nullable();
            $table->integer('power')->nullable();
            $table->integer('pp')->nullable();
            $table->integer('accuracy')->nullable();
            $table->integer('priority')->nullable();
            $table->integer('target_id')->nullable();
            $table->integer('damage_class_id')->nullable();
            $table->integer('effect_id')->nullable();
            $table->text('effect_chance');
            $table->integer('contest_type_id')->nullable();
            $table->integer('contest_effect_id')->nullable();
            $table->integer('super_contest_effect_id')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('moves');
    }
}
