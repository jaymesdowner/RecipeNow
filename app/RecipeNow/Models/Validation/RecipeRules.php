<?php namespace RecipeNow\Models\Validation;

use RecipeNow\Models\Validation\formValidation;

class RecipeRules extends formValidation {
    /**
     * Validation rules for Recipes Form
     *
     * @var array
     */
    protected $rules = [
        'user_id' => 'required',
        'recipe_title' => 'required|max:255',
        'recipe_category' => 'required|max:32',
        'recipe_type' => 'required|max:32',
        'recipe_nationality' => 'required|max:32',
        'recipe_rating' => 'required|numeric'
    ];
}