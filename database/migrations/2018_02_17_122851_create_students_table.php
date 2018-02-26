<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name');
            $table->string('last_name');
            $table->string('dni');
            $table->enum('sex', ['NENA', 'NENE']);
            $table->date('birth_date');
            $table->mediumText('observation')->nullable();
            $table->string('photo')->nullable();
            $table->integer('school_id')->unsigned();
            $table->integer('room_id')->unsigned();
            $table->integer('tutor_id')->unsigned();

            $table->timestamps();

            //relaciones

            $table->foreign('school_id')->references('id')->on('schools')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('room_id')->references('id')->on('rooms')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('tutor_id')->references('id')->on('tutors')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
