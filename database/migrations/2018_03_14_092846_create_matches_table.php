<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matches', function (Blueprint $table) {
        $table->increments('id');
        $table->integer('teamId1');
        $table->integer('teamId2');
        $table->integer('groupId')->unsigned();
        $table->foreign('groupId')->references('id')->on('groupes')->onDelete('cascade');
        $table->string('title');
        $table->string('date');
        $table->string('time');
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
        Schema::dropIfExists('matches');

    }
}
