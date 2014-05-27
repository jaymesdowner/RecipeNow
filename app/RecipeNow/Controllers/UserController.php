<?php namespace RecipeNow\Controllers;

use RecipeNow\Facades\ManagesUsers;
use RecipeNow\Models\Validation\RegistrationRules;
use RecipeNow\Models\Validation\UpdateProfileRules;

class UserController extends \Controller {

    /**
     * @param RegistrationRules $registrationForm
     * @param UpdateProfileRules $updateProfileForm
     */
    public function __construct(RegistrationRules $registrationForm, UpdateProfileRules $updateProfileForm) {
        $this->registrationForm = $registrationForm;
        $this->updateProfileForm = $updateProfileForm;
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAllUsers()
    {
        $users = ManagesUsers::getAllUsers();
        return \Response::json($users);
    }

    /**
     * @param $userId
     * @return \Illuminate\Http\JsonResponse
     */
    public function getUserById($userId)
    {
        $user = ManagesUsers::getUserById($userId);
        return \Response::json($user);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function postRegister()
	{
        $this->registrationForm->validate(\Input::json()->all());

        $user = ManagesUsers::createNewUser(\Input::json()->all());
        return \Response::json($user, 201);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function postLogin()
    {
        // attempt to login
        $user = ManagesUsers::loginUser(\Input::json()->all());
        return \Response::json($user);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function getLogout()
    {
        ManagesUsers::logoutUser();
        return \Response::json('Logged Out');
    }
}