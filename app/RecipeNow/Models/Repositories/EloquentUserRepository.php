<?php namespace RecipeNow\Models\Repositories;

use RecipeNow\Models\Interfaces\UserInterface;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

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
     * @param \Eloquent $user
     * @return EloquentUserRepository
     */
    public function __construct(\Eloquent $user)
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
            throw new NotFoundHttpException('No Users Found');
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
            throw new NotFoundHttpException('No User Found with ID #' . $userId);
        }

        return $user;
    }

    public function createNewUser($input)
    {
        $user = $this->userModel->create($input);

//        // Add Role
//        $user->addRole('Regular');
//
//        // Add Subscription to User
//        $user->subscription($input['plan'])->create($input['creditCardToken']);
//
//        // Fire Event
//        $this->events->fire('user.register', array($user));

        return $user;
    }
}