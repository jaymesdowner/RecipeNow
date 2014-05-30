<?php namespace RecipeNow\Models\Validation;

class IngredientRules extends formValidation {
    /**
     * Validation rules for Prayer Request Form
     *
     * @var array
     */
    protected $rules = [
        'ingredient_title' => 'required|max:255',
        'measurement_amount' => 'required|numeric',
        'measurement_type' => 'max:32'
    ];
}
