<?php
namespace RecipeNow;

use RecipeNow\Models\Entities\Recipe;
use RecipeNow\Models\Entities\User;
use RecipeNow\Repositories\EloquentRecipeRepository;
use RecipeNow\Repositories\EloquentUserRepository;
use Illuminate\Support\ServiceProvider;
use RecipeNow\Services\ManagesRecipes;
use RecipeNow\Services\ManagesUsers;

class RecipeNowServiceProvider extends ServiceProvider {
    public function register()
    {
        /*
         *  Recipe Bindings
         */
        $this->app->bind('RecipeNow\Interfaces\RecipeInterface', function($app)
        {
            // Return a new instance of RecipeRepository with the Recipe model as the parameter
            return new EloquentRecipeRepository(new Recipe());
        });

        // Used in Facade
        $this->app->bind('ManagesRecipes', function($app)
        {
            // Return a new RecipeService instance with an instance of RecipeInterface from the IoC as the parameter
            return new ManagesRecipes($app->make('RecipeNow\Interfaces\RecipeInterface'));
        });

        /*
         *  User Bindings
         */
        $this->app->bind('RecipeNow\Interfaces\UserInterface', function($app)
        {
            // Return a new instance of UserRepository with the User model as the parameter
            return new EloquentUserRepository(new User());
        });

        // Used in Facade
        $this->app->bind('ManagesUsers', function($app)
        {
            // Return a new RecipeService instance with an instance of RecipeInterface from the IoC as the parameter
            return new ManagesUsers($app->make('RecipeNow\Interfaces\UserInterface'));
        });
    }
}