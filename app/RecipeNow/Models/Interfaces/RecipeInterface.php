<?php namespace RecipeNow\Models\Interfaces;
use RecipeNow\Models\Entities\Recipe;

interface RecipeInterface
{
    public function index();
    public function find($recipeId, $showIngredients);
    public function create($input);
    public function update($input, \Eloquent $recipe);
    public function delete($id);
}