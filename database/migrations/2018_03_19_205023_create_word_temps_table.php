<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWordTempsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('word_temps', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('dict_id')->nullable();
            $table->integer('word_id')->nullable();
            $table->string('word');
            $table->string('shortDesc');
            $table->text('fullDesc');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('word_temps');
    }
}
