<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTaskReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('task_reports', function (Blueprint $table) {
            $table->unsignedInteger('individual_report_id');
            $table->string('latest_progress');
            $table->unsignedInteger('task_id');
            $table->integer('sprint');
            $table->integer('remaining_sprints');
            $table->integer('reassigned');
            $table->timestamps();

            $table->foreign('individual_report_id')->references('id')->on('individual_reports');
            $table->foreign('task_id')->references('id')->on('tasks');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('task_reports');
    }
}
