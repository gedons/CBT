<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exams', function (Blueprint $table) {
            $table->id();
            $table->string('exam');
            $table->date('exam_date');
            $table->time('exam_time');
            $table->unsignedBigInteger('course_id');
            $table->unsignedTinyInteger('exam_hours');
            $table->unsignedTinyInteger('exam_minutes');
            $table->unsignedBigInteger('mode_id');
            $table->unsignedBigInteger('level_id');
            $table->unsignedBigInteger('department_id');

            $table->index('mode_id');
            $table->index('level_id');
            $table->index('department_id');
            $table->index('course_id');
            $table->boolean('status')->default(0);
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
        Schema::dropIfExists('exams');
    }
}
