<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdoptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
         Schema::create('adoptions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->index();
            $table->integer('domicile')->index();
            $table->boolean('type'); //0 for dog , 1 for cat
            $table->string('breed');//jenis anjing atau kucingnya
            $table->string('sex');//male or female
            $table->string('age');//age category
            $table->string('color');//base color
            $table->boolean('done');//is the adoption done
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
        //
    }
}
