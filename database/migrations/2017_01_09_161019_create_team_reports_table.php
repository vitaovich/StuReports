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
            $table->increments('id');
            $table->string('easiest_understand', 2047);
            $table->string('hardest_understand', 2047);
            $table->string('easiest_approach', 2047);
            $table->string('hardest_approach', 2047);
            $table->string('easiest_solve', 2047);
            $table->string('hardest_solve', 2047);
            $table->string('easiest_evaluate', 2047);
            $table->string('hardest_evaluate', 2047);
            $table->string('pace');
            $table->string('client');
            $table->string('comments');
            $table->integer('sprint');
			$table->unsignedInteger('submitted_by');
            $table->unsignedInteger('group_id');
            $table->timestamps();
            $table->foreign('group_id')->references('id')->on('project_groups');
			$table->foreign('submitted_by')->references('id')->on('users');
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
