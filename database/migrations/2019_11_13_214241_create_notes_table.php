<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notes', function (Blueprint $table) {

            //$table->bigIncrements('note_id');
            $table->bigIncrements('id');

            $table->unsignedBigInteger('user_id');
            //$table->foreign('user_id')->on('users')->references('user_id');
            $table->foreign('user_id')->on('users')->references('id');

            $table->string('title',50);
            $table->string('note',1000)->nullable();
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
        Schema::dropIfExists('notes');
    }
}
