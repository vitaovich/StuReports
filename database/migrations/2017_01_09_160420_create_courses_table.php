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
            $table->increments('id');
            $table->unsignedInteger('teacher_id')->nullable();
            $table->unsignedInteger('year');
            $table->unsignedInteger('quarter');
            $table->string('course_title');
            $table->unsignedInteger('sprint_length');
            $table->dateTime('last_sprint_end')->nullable();
            $table->dateTime('next_sprint_end')->nullable();
            $table->boolean('reports_available')->default(false);
            $table->boolean('active')->default(false);
            $table->unsignedInteger('sprint')->default(0);
            $table->timestamps();

            $table->foreign('teacher_id')->references('id')->on('users');
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
