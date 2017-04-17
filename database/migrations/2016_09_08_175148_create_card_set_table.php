<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCardSetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('card_set', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('card_id')->unsigned()->index();
            $table->integer('set_id')->unsigned()->index();
            $table->integer('order')->unsigned();

            $table->foreign('card_id')
                ->references('id')->on('cards')
                ->onDelete('cascade');

            $table->foreign('set_id')
                ->references('id')->on('sets')
                ->onDelete('cascade');

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
        Schema::dropIfExists('card_set');
    }
}
