<?php
namespace RecipeNow\Models\Entities;

class Ingredient extends \Eloquent {
	protected $fillable = [];

    public function recipe()
    {
        return $this->belongsTo('Recipe');
    }
}