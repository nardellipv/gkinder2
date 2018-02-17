<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessageTutorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('message_tutor', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('message_id')->unsigned();
            $table->integer('tutor_id')->unsigned();


            //relaciones

            $table->foreign('message_id')->references('id')->on('messages')
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
        Schema::dropIfExists('message_tutor');
    }
}
