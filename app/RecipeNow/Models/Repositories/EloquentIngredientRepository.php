<?php namespace RecipeNow\Models\Repositories;

use RecipeNow\Models\Interfaces\RecipeInterface;
use RecipeNow\Models\Interfaces\IngredientInterface;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * Our ingredient repository, containing commonly used queries
 */
class EloquentIngredientRepository implements IngredientInterface
{
    // Our Eloquent recipe and ingredient models
    protected $ingredientModel;
    protected $recipeModel;

    /**
     * Setting our class $ingredientModel to the injected model
     *
     * @param \Eloquent $ingredient
     * @param \Eloquent $recipe
     */
    public function __construct(\Eloquent $ingredient, \Eloquent $recipe)
    {
        $this->ingredientModel = $ingredient;
        $this->recipeModel = $recipe;
    }

    /**
     * Returns the recipe object associated with the passed id
     *
     * @param mixed $ingredientId
     * @return Model
     * @throws NotFoundHttpException
     */
    public function find($ingredientId)
    {
        $ingredient = $this->ingredientModel->find($ingredientId);

        if (!$ingredient) {
            throw new NotFoundHttpException("Ingredient Not Found");
        }

        return $ingredient;
    }

    /**
     * Create and then return a Recipe
     *
     * @param mixed $recipeId
     * @param mixed $input
     * @return Model
     */
    public function create($recipeId, $input)
    {
        // Attempt to create
        $ingredient = new $this->ingredientModel($input);

        $recipe = $this->recipeModel->find($recipeId);

        $recipe->ingredients()->save($ingredient);

        return $ingredient;
    }

    /**
     * Edit and then return Recipe
     *
     * @param mixed $input
     * @param \Eloquent $ingredient
     * @return Model
     */
    public function update($input, \Eloquent $ingredient)
    {
        // Update Ingredient
        $ingredient->fill($input);
        $ingredient->save();

        return $ingredient;
    }

    /**
     * Delete Recipe
     *
     * @param int $ingredientId
     * @return Model
     * @throws NotFoundHttpException
     */
    public function delete($ingredientId) {
        $ingredient = $this->ingredientModel->where('id', '=', $ingredientId)->first();

        if (!$ingredient) {
            throw new NotFoundHttpException("No Ingredient with id #" . $ingredientId . " Found");
        }

        $ingredient->delete();
    }
}