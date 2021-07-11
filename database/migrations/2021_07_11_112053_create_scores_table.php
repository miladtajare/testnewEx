<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scores', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
          
            $table->integer('score_number');

            $table->unsignedBigInteger('class_room_id');
            $table->foreign('class_room_id')->references('id')->on('class_rooms')->onDelete('cascade');

            $table->unsignedBigInteger('student_id');
            $table->foreign('student_id')->references('id')->on('users')->onDelete('cascade');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('scores');
    }
}
