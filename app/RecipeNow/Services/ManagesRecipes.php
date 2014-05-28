<?php namespace RecipeNow\Services;

use RecipeNow\Models\Interfaces\RecipeInterface;

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

    /**
     * @param $input
     * @return mixed
     * @throws AccessDeniedHttpException
     */
    public function createNewRecipe($input) {

        // Make sure the user is passing their ID and not another user's.
//        if ($input['user_id'] != \Auth::user()->id) {
//            throw new AccessDeniedHttpException('Not Authorized');
//        }

        return $this->recipeRepo->create($input);
    }

}
