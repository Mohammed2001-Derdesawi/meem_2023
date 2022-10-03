<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('title');
            $table->integer('lectures_num');
            $table->longText('description');
            $table->date('start_at');
            $table->date('end_at');
            $table->integer('price');
            $table->enum('type' , ['paid' , 'free' , 'partnership']);
            $table->tinyInteger('visiable');
            $table->integer('course_time');
            $table->string('dates_image');
            $table->string('sub_title');

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
        Schema::dropIfExists('courses');
    }
}
