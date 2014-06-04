<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRecipesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
        Schema::create('recipes', function($table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('recipe_title', 255);
            $table->longText('recipe_description');
            $table->longText('recipe_instructions');
            $table->string('recipe_category', 32);
            $table->string('recipe_type', 32);
            $table->string('recipe_nationality', 32);
            $table->integer('recipe_rating');
            $table->string('recipe_slug', 255);
            $table->string('recipe_photo', 255);
            $table->timestamps();
//            $table->foreign('user_id')
//                ->references('id')->on('users')
//                ->onDelete('cascade');
        });
     }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
     public function down()
     {

        Schema::drop('recipes');
     }
}