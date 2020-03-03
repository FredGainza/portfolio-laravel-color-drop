<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('games', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('player_id');
            $table->foreign('player_id')->references('id')->on('players')
                                        ->onDelete('cascade')->onUpdate('cascade');

            $table->enum('difficulty', ['facile', 'moyen', 'difficile']);
            $table->integer('numGame')->default(0);
            $table->unsignedBigInteger('level_id');
            $table->foreign('level_id')->references('id')->on('levels')
                                        ->onDelete('cascade')->onUpdate('cascade');

            $table->integer('score_level')->default(0);
            $table->float('duree_level', 6, 2)->default(0);
            $table->integer('score_game')->default(0);
            $table->float('duree_game', 6, 2)->default(0);
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
        Schema::dropIfExists('games');
    }
}
