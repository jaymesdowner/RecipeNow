<?php namespace RecipeNow\Repositories;

use RecipeNow\Interfaces\UserInterface;
use Illuminate\Database\Eloquent\Model;

/**
 * Our user repository, containing commonly used queries
 */
class EloquentUserRepository implements UserInterface
{
    // Our Eloquent user model
    protected $userModel;

    /**
     * Setting our class $userModel to the injected model
     *
     * @param Model $user
     * @return EloquentUserRepository
     */
    public function __construct(Model $user)
    {
        $this->userModel = $user;
    }

    /**
     * Returns users
     *
     * @return Model
     * @throws \Exception
     */
    public function getAllUsers()
    {
        $users = $this->userModel->all();

        if (!$users) {
            throw new \Exception('No Users Found');
        }

        return $users;
    }

    /**
     * Returns the user object associated with the passed id
     *
     * @param mixed $userId
     * @return Model
     * @throws \Exception
     */
    public function getUserById($userId)
    {
        $user = $this->userModel->find($userId);

        if (!$user) {
            throw new \Exception('User Not Found');
        }

        return $user;
    }

    public function createNewUser($input)
    {
        $user = $this->userModel->fill($input);

        if (!$user->save()) {
            throw new \InvalidArgumentException($this->userModel->getErrors());
        }

        return $user;
    }
}