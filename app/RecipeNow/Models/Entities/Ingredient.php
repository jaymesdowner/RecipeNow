<?php
namespace RecipeNow\Models\Entities;
use Way\Database\Model;

class Ingredient extends Model {
	protected $fillable = [];

    public function recipe()
    {
        return $this->belongsTo('Recipe');
    }
}