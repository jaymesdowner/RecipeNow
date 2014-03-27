<?php namespace RecipeNow\Repositories;

use RecipeNow\Interfaces\RecipeInterface;
use Illuminate\Database\Eloquent\Model;
//use \stdClass;

/**
 * Our recipe repository, containing commonly used queries
 */
class EloquentRecipeRepository implements RecipeInterface
{
    // Our Eloquent recipe model
    protected $recipeModel;

    /**
     * Setting our class $recipeModel to the injected model
     *
     * @param Model $recipe
     * @return EloquentRecipeRepository
     */
    public function __construct(Model $recipe)
    {
        $this->recipeModel = $recipe;
    }

    /**
     * Returns recipes
     *
     * @return Model
     * @throws \Exception
     */
    public function getAllRecipes()
    {
        $recipes = $this->recipeModel->all();

        if (!$recipes) {
            throw new \Exception('No Recipes Found');
        }

        return $recipes;
    }

    /**
     * Returns the recipe object associated with the passed id
     *
     * @param mixed $recipeId
     * @param bool $showIngredients
     * @return Model
     * @throws \Exception
     */
    public function getRecipeById($recipeId, $showIngredients)
    {
        if (!$showIngredients) {
            $recipe = $this->recipeModel->find($recipeId);
        } else {
            $recipe = $this->recipeModel->with('ingredients')->find($recipeId);
        }

        if (!$recipe) {
            throw new \Exception('No Recipe Found');
        }

        return $recipe;
    }

//    /**
//     * Converting the Eloquent object to a standard format
//     *
//     * @param mixed $recipe
//     * @return stdClass
//     */
//    protected function convertFormat($recipe)
//    {
//        if ($recipe == null)
//        {
//            return null;
//        }
//
//        $object = new stdClass();
//        $object->id = $recipe->id;
//
//        return $object;
//    }
}