<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGradebookTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gradebook', function (Blueprint $table) {
			$table->increments('id');
            $table->unsignedInteger('student_id');
            $table->unsignedInteger('assignment_id');
            $table->boolean('submitted');
            $table->integer('grade');
            $table->timestamps();

            $table->foreign('student_id')->references('id')->on('users');
            $table->foreign('assignment_id')->references('id')->on('assignments');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gradebook');
    }
}
