<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTaskEvaluationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('task_evaluations', function (Blueprint $table) {
            $table->unsignedInteger('Task_id');
            $table->unsignedInteger('Individual_Report_id');
            $table->string('Concur');
            $table->string('Comments');
            $table->timestamps();

            $table->foreign('Task_id')->references('Task_id')->on('tasks');
            $table->foreign('Individual_Report_id')->references('Individual_Report_id')->on('individual_reports');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('task_evaluations');
    }
}
