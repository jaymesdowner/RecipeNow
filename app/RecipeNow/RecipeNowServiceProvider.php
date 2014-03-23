<?php
namespace RecipeNow;

use RecipeNow\Models\Recipe;
use RecipeNow\Models\User;
use RecipeNow\Repositories\EloquentRecipeRepository;
use RecipeNow\Repositories\EloquentUserRepository;
use Illuminate\Support\ServiceProvider;
use RecipeNow\Services\ManagesRecipes;

class RecipeNowServiceProvider extends ServiceProvider {
    public function register()
    {
        /*
         *  User Bindings
         */
        $this->app->bind('RecipeNow\Interfaces\UserInterface', function($app)
        {
            // Return a new instance of UserRepository with the User model as the parameter
            return new EloquentUserRepository(new User());
        });
    }
}