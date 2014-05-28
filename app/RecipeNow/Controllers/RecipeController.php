<?php
namespace RecipeNow\Controllers;
use RecipeNow\Facades\ManagesRecipes;
use RecipeNow\Models\Validation\RecipeRules;

class RecipeController extends \Controller {

    protected $recipeForm;

    public function __construct(RecipeRules $recipeForm) {
        $this->recipeForm = $recipeForm;
    }

    /**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $recipes = ManagesRecipes::getAllRecipes();
        return \Response::json($recipes);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
        $this->recipeForm->validate(\Input::json()->all());
        $recipe = ManagesRecipes::createNewRecipe(\Input::json()->all());

        return \Response::json($recipe);
    }

    /**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        $recipe = ManagesRecipes::getRecipeById($id, true);
        return \Response::json($recipe);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}