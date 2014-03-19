<?php
namespace RecipeNow\Models;
use Way\Database\Model;

class Recipe extends Model {
	protected $fillable = [];

    public function ingredients()
    {
        return $this->hasMany('\RecipeNow\Models\Ingredient');
    }
}