<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssignmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assignments', function (Blueprint $table) {
            $table->increments('id');
			$table->unsignedInteger('course_id');
            $table->string('assignment_name');
			$table->string('code');//Individual report, I, team Report, T ex. I.1 T.1 I.2 T.2, ..., I.N T.N
			$table->integer('sprint');//used to identify what sprint a report is for
            $table->date('open_assignment');
            $table->date('close_assignment');
            $table->timestamps();
			
			$table->foreign('course_id')->references('id')->on('courses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('assignments');
    }
}
