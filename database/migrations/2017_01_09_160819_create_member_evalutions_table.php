<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMemberEvalutionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('member_evaluations', function (Blueprint $table) {
			$table->increments('id');
            $table->unsignedInteger('student_id');
            $table->unsignedInteger('individual_report_id');
            $table->string('concur_hours');
            $table->string('performing');
            $table->string('comments')->nullable();
            $table->timestamps();

            $table->foreign('individual_report_id')->references('id')->on('individual_reports');
            $table->foreign('student_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('member_evaluations');
    }
}
