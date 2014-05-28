<?php namespace RecipeNow\Services;

use RecipeNow\Models\Interfaces\UserInterface;

class ManagesUsers
{
    protected $userRepo;

    public function __construct(UserInterface $userRepo)
    {
        $this->userRepo = $userRepo;
    }

    public function getAllUsers()
    {
        return $this->userRepo->getAllUsers();
    }

    public function getUserById($userId)
    {
        return $this->userRepo->getUserById($userId, false);
    }

    public function createNewUser($input)
    {
        return $this->userRepo->createNewUser($input);
    }

    public function loginUser($input)
    {
        // attempt to login
        if (!\Auth::attempt(array('email' => $input['email'], 'password' => $input['password']))) {
            throw new AccessDeniedHttpException("Invalid Credentials");
        }

        return \Auth::user();
    }

    public function logoutUser()
    {
        \Auth::logout();
    }

}
