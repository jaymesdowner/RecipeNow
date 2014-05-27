<?php namespace RecipeNow\Controllers;

use RecipeNow\Facades\ManagesUsers;

class UserController extends \Controller {

    public function getAllUsers()
    {
        try {
            $users = ManagesUsers::getAllUsers();
        } catch (\Exception $e) {
            return \Response::json($e->getMessage(), 404);
        }

        return \Response::json($users);
    }

    public function getUserById($userId)
    {
        try {
            $user = ManagesUsers::getUserById($userId);
        } catch (\Exception $e) {
            return \Response::json($e->getMessage(), 404);
        }

        return \Response::json($user);
    }

    public function postRegister()
	{
        try {
            $user = ManagesUsers::createNewUser(\Input::json()->all());
        } catch (\Exception $e) {
            return \Response::make($e->getMessage(), 401);
        }

        return \Response::json($user, 201);
    }

    public function postLogin()
    {
        // attempt to do the login
        try {
            $user = ManagesUsers::loginUser(\Input::json()->all());
        } catch (\Exception $e) {
            return \Response::json($e->getMessage(), 403);
        }

        return \Response::json($user);
    }

    public function getLogout()
    {
        ManagesUsers::logoutUser();

        return \Response::json('Logged Out');
    }
}