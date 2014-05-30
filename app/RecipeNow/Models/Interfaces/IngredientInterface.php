<?php namespace RecipeNow\Models\Interfaces;
use RecipeNow\Models\Entities\Ingredient;

interface IngredientInterface
{
    public function find($ingredientId);
    public function create($recipeId, $input);
    public function update($input, \Eloquent $ingredient);
    public function delete($id);
}