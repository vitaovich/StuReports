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
            $table->string('easiest_understand');
            $table->string('hardest_understand');
            $table->string('easiest_approach');
            $table->string('hardest_approach');
            $table->string('easiest_solve');
            $table->string('hardest_solve');
            $table->string('easiest_evaluate');
            $table->string('hardest_evaluate');
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
