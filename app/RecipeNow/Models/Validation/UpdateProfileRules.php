<?php namespace RecipeNow\Models\Validation;

class UpdateProfileRules extends formUpdateValidation {
    /**
     * Validation rules for Registration
     *
     * @var array
     */
//    protected $rules = [
//        'email' => 'email|required|max:50|unique:users,email,:ignore_id',
//        'password' => 'min:6',
//        'first_name' => 'required|max:50',
//        'last_name' => 'required|max:50',
//        'city' => 'max:100',
//        'state' => 'max:2',
//        'phone' => 'max:12',
//        'profile_image_url' => 'max:140',
//        'bio' => 'max:140'
//    ];

    protected $rules = array(
        'email' => 'email|required|max:50|unique:users,email,:ignore_id',
        'name' => 'required',
        'password' => 'min:6'
    );

}