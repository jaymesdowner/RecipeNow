<?php namespace RecipeNow\Facades;

use \Illuminate\Support\Facades\Facade;

/**
 * Facade class to be called whenever the class RecipeCrudService is called
 */
class ManagesUsers extends Facade {
    protected static function getFacadeAccessor() { return 'ManagesUsers'; }
}