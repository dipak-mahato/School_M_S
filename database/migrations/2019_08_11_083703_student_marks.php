<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class StudentMarks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_marks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('student_id')
                            ->unsigned()
                             ->references('id')
                             ->on('students');            
                 $table->integer('subject_id')
                            ->unsigned()
                             ->references('id')
                             ->on('subjects');
            $table->integer('exam_id')
                            ->unsigned()
                             ->references('id')
                             ->on('exams');
            $table->float('obtained_mark');                 
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
        Schema::dropIfExists('student_marks');
    }
}
