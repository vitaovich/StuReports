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
            $table->unsignedInteger('Individual_Report_id');
            $table->string('Latest_Progress');
            $table->unsignedInteger('Task_id');
            $table->integer('Sprint');
            $table->integer('Remaining_Sprints');
            $table->integer('Reassigned');
            $table->timestamps();

            $table->foreign('Individual_Report_id')->references('Individual_Report_id')->on('individual_reports');
            $table->foreign('Task_id')->references('Task_id')->on('tasks');
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
