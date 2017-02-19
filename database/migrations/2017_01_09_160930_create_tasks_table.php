<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('description');
            $table->string('task_name');
            $table->unsignedInteger('student_id');
			$table->integer('sprint_started');
			$table->integer('sprint_ended');
            $table->string('status');
            $table->unsignedInteger('group_id');
            $table->timestamps();
            
            $table->foreign('student_id')->references('id')->on('users');
            $table->foreign('group_id')->references('id')->on('project_groups');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
}
