<?php
namespace RecipeNow\Models\Entities;

class Recipe extends \Eloquent {
	protected $fillable = [];

    public function ingredients()
    {
        return $this->hasMany('\RecipeNow\Models\Entities\Ingredient');
    }
}