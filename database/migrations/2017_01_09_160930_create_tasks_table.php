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
            $table->increments('Task_id');
            $table->string('Description');
            $table->unsignedInteger('Student_id');
            $table->integer('Status');
            $table->unsignedInteger('Group_id');
            $table->timestamps();

            $table->foreign('Student_id')->references('id')->on('users');
            $table->foreign('Group_id')->references('Group_id')->on('project_groups');
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
