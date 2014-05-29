<?php namespace RecipeNow\Models\Repositories;

use RecipeNow\Models\Interfaces\RecipeInterface;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

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
     * @param \Eloquent $recipe
     * @return EloquentRecipeRepository
     */
    public function __construct(\Eloquent $recipe)
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
            throw new NotFoundHttpException('No Recipes Found');
        }

        return $recipes;
    }

    /**
     * Returns the recipe object associated with the passed id
     *
     * @param mixed $recipeId
     * @param bool $showIngredients
     * @return Model
     * @throws NotFoundHttpException
     */
    public function getRecipeById($recipeId, $showIngredients)
    {
        if (!$showIngredients) {
            $recipe = $this->recipeModel->find($recipeId);
        } else {
            $recipe = $this->recipeModel->with('ingredients')->find($recipeId);
        }

        if (!$recipe) {
            throw new NotFoundHttpException("No Recipe Found");
        }

        return $recipe;
    }

    /**
     * Create and then return a Prayer Request
     *
     * @param mixed $input
     * @throws \Exception
     * @return Model
     */
    public function create($input)
    {
        // Attempt to create
        $recipe = $this->recipeModel->create($input);

//        // Fire Event
//        $this->events->fire('request.create', array(json_decode($request)));
//
        return $recipe;
    }
}