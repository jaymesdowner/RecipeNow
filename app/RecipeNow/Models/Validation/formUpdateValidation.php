<?php
namespace RecipeNow\Models\Validation;

use Illuminate\Validation\Factory as Validator;
use RecipeNow\Exceptions\FormValidationException;

abstract class formUpdateValidation {
    /**
     * @var
     */
    protected $validator;
    protected $validation;

    /**
     * @var Validator
     */
    function __construct(Validator $validator) {
        $this->validator = $validator;
    }

    public function validate(array $formData, $ignore_id) {

        foreach ($this->rules as $key => $rule) {
            $this->rules[$key] = str_replace(',:ignore_id', ',' . $ignore_id, $rule);
        }

        $this->validation = $this->validator->make($formData, $this->getValidationRules());

        if ($this->validation->fails()) {
            throw new FormValidationException('Validation Error', $this->getValidationErrors());
        }

        return true;
    }

    protected function getValidationErrors() {
        return $this->validation->errors();
    }

    protected function getValidationRules() {
        return $this->rules;
    }
}