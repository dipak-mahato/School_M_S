<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMarksdetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('marksdetails', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('subject_id')
                            ->unsigned()
                             ->references('id')
                             ->on('subjects');
             
             $table->integer('exam_id')
                            ->unsigned()
                             ->references('id')
                             ->on('exams');
            $table->integer('schoolclass_id')
                            ->unsigned()
                             ->references('id')
                             ->on('schoolclasses');
             $table->float('FM');
            $table->float('PM');
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
        Schema::dropIfExists('marksdetails');
    }
}
