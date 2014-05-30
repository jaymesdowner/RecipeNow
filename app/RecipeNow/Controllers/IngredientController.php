<?php
namespace RecipeNow\Controllers;
use RecipeNow\Facades\ManagesRecipes;
use RecipeNow\Models\Validation\IngredientRules;

/**
 * Class IngredientController
 * @package RecipeNow\Controllers
 */
class IngredientController extends \Controller {

    protected $ingredientForm;

    public function __construct(IngredientRules $ingredientForm) {
        $this->ingredientForm = $ingredientForm;
    }

    /**
     * @param $recipeId
     * @return \Illuminate\Http\JsonResponse
     */
    public function store($recipeId)
	{
        $this->ingredientForm->validate(\Input::json()->all());
        $ingredient = ManagesRecipes::createNewIngredient($recipeId, \Input::json()->all());

        return \Response::json($ingredient);
    }

    /**
	 * Display the specified resource.
	 *
	 * @param  int  $recipeId
	 * @return Response
	 */
	public function show($recipeId)
	{
        $ingredient = ManagesRecipes::getIngredientById($recipeId, true);
        return \Response::json($ingredient);
	}

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $recipeId
     * @param  int  $ingredientId
     * @return Response
     */
    public function update($recipeId, $ingredientId)
    {
        $this->ingredientForm->validate(\Input::json()->all());
        $ingredient = ManagesRecipes::updateIngredient($ingredientId, \Input::json()->all());

        return \Response::json($ingredient);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $recipeId
     * @param  int  $ingredientId
     * @return Response
     */
    public function destroy($recipeId, $ingredientId)
    {
        $response = ManagesRecipes::deleteIngredient($ingredientId);

        return \Response::json($response);
    }
}