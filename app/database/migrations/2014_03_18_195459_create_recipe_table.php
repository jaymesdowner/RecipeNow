<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRecipeTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
        Schema::create('recipe', function($table) {
            $table->increments('id');
            $table->string('recipe_title', 255);
            $table->longText('recipe_description');
            $table->longText('recipe_instructions');
            $table->string('recipe_category', 32);
            $table->string('recipe_type', 32);
            $table->string('recipe_nationality', 32);
            $table->integer('recipe_rating');
            $table->string('recipe_slug', 255);
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

        Schema::drop('recipe');
     }
}