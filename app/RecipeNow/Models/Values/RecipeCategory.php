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
    protected $allowedCategories = ['Entrees', 'Casseroles', 'Soups', 'Salads', 'Breakfast', 'Sides', 'Appetizers', 'Breads / Grains', 'Desserts', 'None'];

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
    public function disallowInvalidCategories($category)
    {
        if (!in_array($category, $this->allowedCategories)) {
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