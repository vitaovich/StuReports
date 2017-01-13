<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeamReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('team_reports', function (Blueprint $table) {
            $table->increments('Team_Report_id');
            $table->string('Easiest_Understand');
            $table->string('Hardest_Understand');
            $table->string('Easiest_Approach');
            $table->string('Hardest_Approach');
            $table->string('Easiest_Solve');
            $table->string('Hardest_Solve');
            $table->string('Easiest_Evaluate');
            $table->string('Hardest_Evaluate');
            $table->string('Pace');
            $table->string('Client');
            $table->string('Comments');
            $table->integer('Sprint');
            $table->unsignedInteger('Group_id');
            $table->timestamps();
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
        Schema::dropIfExists('team_reports');
    }
}
