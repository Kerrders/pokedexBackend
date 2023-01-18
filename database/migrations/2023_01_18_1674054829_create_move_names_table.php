<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMoveNamesTable extends Migration
{
    public function up()
    {
        Schema::create('move_names', function (Blueprint $table) {
            $table->integer('move_id')->nullable();
            $table->integer('local_language_id')->nullable();
            $table->text('name')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('move_names');
    }
}
