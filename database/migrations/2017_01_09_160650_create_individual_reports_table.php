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
            $table->increments('id');
            $table->string('private_comments')->nullable();
            $table->unsignedInteger('student_id');
            $table->integer('sprint');
			$table->float('total_hours');
            $table->timestamps();

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
        Schema::dropIfExists('individual_reports');
    }
}
