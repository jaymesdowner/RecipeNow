<?php namespace RecipeNow\Services;

use Mockery\CountValidator\Exception;
use RecipeNow\Interfaces\UserInterface;

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
        // attempt to do the login
        if (!\Auth::attempt(array('email' => $input['email'], 'password' => $input['password']))) {
            return null;
        }

        return \Auth::user();
    }

    public function logoutUser()
    {
        \Auth::logout();
    }

}
