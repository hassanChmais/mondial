<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupeTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('groupe_teams', function (Blueprint $table) {
        $table->increments('id');
        $table->integer('groupId')->unsigned();
        $table->foreign('groupId')->references('id')->on('groupes')->onDelete('cascade');
        $table->integer('teamId')->unsigned();
        $table->foreign('teamId')->references('id')->on('teams')->onDelete('cascade');
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
        Schema::dropIfExists('groupe_teams');
    }
}
