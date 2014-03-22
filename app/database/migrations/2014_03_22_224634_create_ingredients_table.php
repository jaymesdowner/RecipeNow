<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateIngredientsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {

         /**
         * Table: ingredients
         */
        Schema::create('ingredients', function($table) {
            $table->increments('id')->unsigned();
            $table->integer('recipe_id')->unsigned();
            $table->string('ingredient_title', 32);
            $table->float('measurement_amount');
            $table->string('measurement_type', 32);
            $table->timestamps();
            $table->foreign('recipe_id')
                ->references('id')->on('recipes')
                ->onDelete('cascade');
        });
     }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
     public function down()
     {

        Schema::drop('ingredients');
     }

}