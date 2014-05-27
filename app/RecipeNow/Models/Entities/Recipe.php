<?php
namespace RecipeNow\Models\Entities;
use Way\Database\Model;

class Recipe extends Model {
	protected $fillable = [];

    public function ingredients()
    {
        return $this->hasMany('\RecipeNow\Models\Ingredient');
    }
}