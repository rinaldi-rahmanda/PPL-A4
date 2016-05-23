<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRatingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //'shelter_id', 'user_id', 'rating', 'comment'
        Schema::create('ratings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('shelter_id')->index();
            $table->integer('user_id')->index();
            $table->integer('rating');
            $table->longText('comment');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
