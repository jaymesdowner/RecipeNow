<?php namespace RecipeNow\Models\Validation;

use RecipeNow\Models\Entities\formValidation;

class RegistrationRules extends formValidation {
    /**
     * Validation rules for Prayer Request Form
     *
     * @var array
     */
    protected $rules = array(
        'email' => 'email|required|unique:users',
        'name' => 'required',
        'password' => 'required|min:6'
    );
}