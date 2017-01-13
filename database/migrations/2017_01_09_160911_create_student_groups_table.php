<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_groups', function (Blueprint $table) {
            $table->unsignedInteger('Student_id');
            $table->unsignedInteger('Group_id');
            $table->unsignedInteger('Class_id');
            $table->timestamps();

            $table->foreign('Student_id')->references('id')->on('users');
            $table->foreign('Group_id')->references('Group_id')->on('project_groups');
            $table->foreign('Class_id')->references('Class_id')->on('classrooms');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student_groups');
    }
}
