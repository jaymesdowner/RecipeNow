<?php namespace RecipeNow\Services;

use RecipeNow\Interfaces\RecipeInterface;

class ManagesRecipes
{
    protected $recipeRepo;

    public function __construct(RecipeInterface $recipeRepo) {
        $this->recipeRepo = $recipeRepo;
    }

    public function getAllRecipes() {
        $recipes = $this->recipeRepo->getAllRecipes();

        if (!$recipes) {
            $recipes = 'No Recipes Found';
        }

        return $recipes;
    }

    public function getRecipeById($recipeId, $showIngredients = true) {
        return $this->recipeRepo->getRecipeById($recipeId, $showIngredients);
    }
}
