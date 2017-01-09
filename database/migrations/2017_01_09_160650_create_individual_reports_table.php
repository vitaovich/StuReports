<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIndividualReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('individual_reports', function (Blueprint $table) {
            $table->increments('Individual_Report_id');
            $table->string('Private_Comments');
            $table->unsignedInteger('Student_id');
            $table->integer('Sprint');
            $table->timestamps();

            $table->foreign('Student_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('individual_reports');
    }
}
