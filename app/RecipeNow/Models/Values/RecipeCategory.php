<?php
namespace RecipeNow\Models\Values;

class RecipeCategory {

    /**
     * @var string
     */
    protected $category;

    /**
     * @var array
     */
    protected $allowedCategories = ['entrees', 'casseroles', 'soups', 'salads', 'breakfast', 'sides', 'appetizers', 'breads / grains', 'desserts', 'none'];

    /**
     * @param $category
     */
    function __construct($category = null)
    {
        if ($category) {
            $this->disallowInvalidCategories($category);
            $this->category = $category;
        }
    }

    /**
     * @param $category
     * @throws \InvalidArgumentException
     */
    public function disallowInvalidNationalities($category)
    {
        if (!in_array($category, $this->$allowedCategories)) {
            throw new \InvalidArgumentException('Invalid Recipe Category');
        }
    }

    public function getAllowedCategories() {
        return $this->allowedCategories;
    }

    public function __toString() {
        return $this->category;
    }
}