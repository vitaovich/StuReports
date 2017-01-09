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
            $table->unsignedInteger('Member_id');
            $table->unsignedInteger('Individual_Report_id');
            $table->string('Concur_Hours');
            $table->string('Performing');
            $table->string('Comments');
            $table->timestamps();

            $table->foreign('Individual_Report_id')->references('Individual_Report_id')->on('individual_reports');
            $table->foreign('Member_id')->references('id')->on('users');
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
