<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_groups', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('course_id')->nullable();
            $table->string('project');
            $table->unsignedInteger('project_leader')->nullable();
            $table->timestamps();
            $table->foreign('course_id')->references('id')->on('courses');
            $table->foreign('project_leader')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('project_groups');
    }
}
