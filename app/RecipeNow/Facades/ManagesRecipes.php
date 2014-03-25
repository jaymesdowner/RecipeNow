<?php namespace RecipeNow\Facades;

use \Illuminate\Support\Facades\Facade;

/**
 * Facade class to be called whenever the class RecipeCrudService is called
 */
class ManagesRecipes extends Facade {

    /**
     * Get the registered name of the component. This tells $this->app what record to return
     * (e.g. $this->app[‘RecipeCrudService’])
     *
     * @return string
     */
    protected static function getFacadeAccessor() { return 'ManagesRecipes'; }

}