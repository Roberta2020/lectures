<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGradesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grades', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('student_id')->unsigned();
            $table->foreign('student_id')
            ->references('id')
            ->on('students')
            ->onDelete('cascade')
            ->onUpdate('restrict');
            $table->bigInteger('lecture_id')->unsigned();
            $table->foreign('lecture_id')
            ->references('id')
            ->on('lectures')
            ->onDelete('cascade')
            ->onUpdate('restrict');
            $table->integer('grade');
            $table->timestamps();

           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('grades');
    }
}
