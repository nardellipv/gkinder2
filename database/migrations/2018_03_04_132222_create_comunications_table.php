<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComunicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comunications', function (Blueprint $table) {
            $table->increments('id');

            $table->string('title');
            $table->mediumText('body');
            $table->dateTime('date');
            $table->integer('school_id')->unsigned();
            $table->integer('tutor_id')->unsigned()->nullable();
            $table->integer('room_id')->unsigned()->nullable();


            //relaciones

            $table->foreign('school_id')->references('id')->on('schools')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('tutor_id')->references('id')->on('tutors')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('room_id')->references('id')->on('rooms')
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
        Schema::dropIfExists('comunications');
    }
}
