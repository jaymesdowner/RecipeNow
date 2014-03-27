<?php
namespace RecipeNow\Controllers;
use RecipeNow\Facades\ManagesRecipes;

class RecipeController extends \Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        try {
            $recipes = ManagesRecipes::getAllRecipes();
        } catch (\Exception $e) {
            return \Response::json($e->getMessage(), 404);
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
        try {
            $recipe = ManagesRecipes::getRecipeById($id, true);
        } catch (\Exception $e) {
            return \Response::json($e->getMessage(), 404);
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