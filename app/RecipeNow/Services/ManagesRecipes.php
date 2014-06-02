<?php namespace RecipeNow\Services;

use RecipeNow\Models\Interfaces\RecipeInterface;
use RecipeNow\Models\Interfaces\IngredientInterface;

class ManagesRecipes
{
    protected $recipeRepo;

    /**
     * @param RecipeInterface $recipeRepo
     * @param IngredientInterface $ingredientRepo
     */
    public function __construct(RecipeInterface $recipeRepo, IngredientInterface $ingredientRepo) {
        $this->recipeRepo = $recipeRepo;
        $this->ingredientRepo = $ingredientRepo;
    }

    /**
     * @return mixed
     */
    public function getAllRecipes() {
        return $this->recipeRepo->index();
    }

    /**
     * @param $recipeId
     * @param bool $showIngredients
     * @return mixed
     */
    public function getRecipeById($recipeId, $showIngredients = true) {
        return $this->recipeRepo->find($recipeId, $showIngredients);
    }

    /**
     * @param $input
     * @return mixed
     */
    public function createNewRecipe($input) {
        return $this->recipeRepo->create($input);
    }

    /*
    * @param $id
    * @param $input
    * @return mixed
    */
    /**
     * @param $id
     * @param $input
     * @return mixed
     */
    public function updateRecipe($id, $input) {
        $recipe = $this->recipeRepo->find($id, false);
        return $this->recipeRepo->update($input, $recipe);
    }

    /**
     * @param $id
     * @return string
     */
    public function deleteRecipe($id) {
        $recipe = $this->recipeRepo->find($id, false);
        $this->recipeRepo->delete($id);

        return "Recipe with id #" . $id . " has been chopped.";
    }
}
