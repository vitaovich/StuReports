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
            $table->unsignedInteger('Student_id');
            $table->unsignedInteger('Assignment_id');
            $table->unsignedInteger('Class_id');
            $table->integer('Submitted');
            $table->integer('Grade');
            $table->timestamps();

            $table->foreign('Student_id')->references('id')->on('users');
            $table->foreign('Assignment_id')->references('Assignment_id')->on('assignments');
            $table->foreign('Class_id')->references('Class_id')->on('classes');
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
