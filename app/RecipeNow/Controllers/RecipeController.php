<?php
namespace RecipeNow\Controllers;
use RecipeNow\Services\ManagesRecipes;

class RecipeController extends \Controller {

    protected $ManagesRecipes;

    public function __construct(ManagesRecipes $ManagesRecipes) {
        $this->ManagesRecipes = $ManagesRecipes;
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $recipes = $this->ManagesRecipes->getAllRecipes();

        if (!$recipes) {
//            return Response::json(array('message' => Lang::get('onetimenote.messages.NOTE_NOT_FOUND')), 404);
            return \Response::json(array('message' => 'No Recipes Found'), 404);
        }

        return \Response::json($recipes);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        $recipe = \ManagesRecipes::getRecipeById($id, true);
//        $recipe = $this->ManagesRecipes->getRecipeById($id, true);

        if (!$recipe) {
//            return Response::json(array('message' => Lang::get('onetimenote.messages.NOTE_NOT_FOUND')), 404);
            return \Response::json(array('message' => 'Recipe Not Found'), 404);
        }

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