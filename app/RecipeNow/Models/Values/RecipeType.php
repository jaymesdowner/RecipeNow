<?php
namespace RecipeNow\Models\Values;

class RecipeType {

    /**
     * @var string
     */
    protected $type;

    /**
     * @var array
     */
    protected $allowedTypes = ['poultry', 'beef', 'seafood', 'pork', 'none'];

    /**
     * @param $type
     */
    function __construct($type = null)
    {
        if ($type) {
            $this->disallowInvalidTypes($type);
            $this->type = $type;
        }
    }

    /**
     * @param $type
     * @throws \InvalidArgumentException
     */
    public function disallowInvalidTypes($type)
    {
        if (!in_array($type, $this->$allowedTypes)) {
            throw new \InvalidArgumentException('Invalid Recipe Type');
        }
    }

    public function getAllowedTypes() {
        return $this->allowedTypes;
    }

    public function __toString() {
        return $this->type;
    }
}