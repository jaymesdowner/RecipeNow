<?php
namespace RecipeNow\Models\Entities;

class Ingredient extends \Eloquent {
	protected $fillable = [];
	protected $guarded = [];

    public function recipe()
    {
        return $this->belongsTo('Recipe');
    }
}