<?php
namespace RecipeNow\Models;
use Way\Database\Model;

class Ingredient extends Model {
	protected $fillable = [];

    public function recipe()
    {
        return $this->belongsTo('Recipe');
    }
}