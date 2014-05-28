<?php
namespace RecipeNow\Models\Entities;
use RecipeNow\Models\Values\RecipeType;
use RecipeNow\Models\Values\RecipeCategory;
use RecipeNow\Models\Values\RecipeNationality;
use RecipeNow\Models\Values\RecipeRating;

class Recipe extends \Eloquent {

    protected $fillable = [];
    protected $guarded = [];

    function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }

    public function ingredients()
    {
        return $this->hasMany('\RecipeNow\Models\Entities\Ingredient');
    }

    /**
     * @param $type
     */
    public function setRecipeTypeAttribute($type) {
        $this->attributes['recipe_type'] = (string) new RecipeType($type);
    }

    /**
     * @param $category
     */
    public function setRecipeCategoryAttribute($category) {
        $this->attributes['recipe_category'] = (string) new RecipeCategory($category);
    }

    /**
     * @param $nationality
     */
    public function setRecipeNationalityAttribute($nationality) {
        $this->attributes['recipe_nationality'] = (string) new RecipeNationality($nationality);
    }

    /**
     * @param $rating
     */
    public function setRecipeRatingAttribute($rating) {
        $this->attributes['recipe_rating'] = (string) new RecipeRating($rating);
    }
}