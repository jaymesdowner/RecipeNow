<?php namespace PrayerApp\Models\Validation;

class RecipeRules extends formValidation {
    /**
     * Validation rules for Prayer Request Form
     *
     * @var array
     */
    protected $rules = [
        'user_id' => 'required',
        'recipe_title' => 'required|max:255',
//        'recipe_description' => '',
//        'recipe_instructions' => '',
//        'recipe_slug' => '',
        'recipe_type' => 'required|max:32',
        'recipe_nationality' => 'required|max:32',
        'recipe_rating' => 'numberic|required',
    ];
}