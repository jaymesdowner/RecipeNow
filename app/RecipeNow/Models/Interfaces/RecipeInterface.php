<?php namespace RecipeNow\Interfaces;

interface RecipeInterface
{
    public function getAllRecipes();

    public function getRecipeById($recipeId, $showIngredients);
}