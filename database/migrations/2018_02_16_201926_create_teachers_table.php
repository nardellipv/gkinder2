<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name');
            $table->string('last_name');
            $table->string('phone');
            $table->string('address');
            $table->string('email', 150)->unique();
            $table->string('photo')->nullable();
            $table->mediumText('observation')->nullable();
            $table->integer('school_id')->unsigned();
            $table->integer('room_id')->unsigned();

            $table->timestamps();

            //relaciones

            $table->foreign('school_id')->references('id')->on('schools')
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
        Schema::dropIfExists('teachers');
    }
}
