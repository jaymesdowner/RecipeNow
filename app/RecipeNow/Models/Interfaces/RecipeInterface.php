<?php namespace RecipeNow\Models\Interfaces;

interface RecipeInterface
{
    public function getAllRecipes();

    public function getRecipeById($recipeId, $showIngredients);
}