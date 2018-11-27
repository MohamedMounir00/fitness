<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExercisesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exercises', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name_ar');
            $table->string('name_en');
            $table->string('rest');
            $table->enum('value_date',['sec','min','hr','day']);
            $table->string('sets');
            $table->string('reps');
            $table->string('video');
            $table->text('instructions_ar');
            $table->text('instructions_en');
            $table->text('tips_ar');
            $table->text('tips_en');
            $table->string('image');
            $table->integer('level_id')->unsigned();
            $table->foreign('level_id')->references('id')->on('levels')->onDelete('cascade');
            $table->integer('eq_id')->unsigned();
            $table->foreign('eq_id')->references('id')->on('equipment')->onDelete('cascade');
            $table->integer('body_id')->unsigned();
            $table->foreign('body_id')->references('id')->on('bodyparts')->onDelete('cascade');
            $table->softDeletes();

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
        Schema::dropIfExists('exercises');
    }
}
