<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('class_rooms', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('title_class_room');
            
            $table->string('number_class_room')->nullable()->unique();
            
            $table->text('description_lg_class_room');
            $table->text('description_sm_class_room');
            
            $table->time('time_class_room');

            $table->date('start_class_room');
            $table->date('end_class_room');

            $table->date('date_exam_class_room');

            $table->string('capacity_class_room');

            $table->unsignedBigInteger('courses_id');
            $table->foreign('courses_id')->references('id')->on('courses')->onDelete('cascade');



        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('class_rooms');
    }
}
