<?php

use RecipeNow\Models\Entities\User;
use RecipeNow\Facades\ManagesUsers;

class UsersControllerTest extends TestCase {

    protected $user;

    public function setUp() {
        parent::setUp();

        $this->user = new User;
        $this->user->id = 1;
        $this->user->name = 'John Doe';
        $this->user->email = 'e-mail@address.com';
    }

    public function tearDown() {
        Mockery::close();
        unset($this->user);
    }

    public function test_get_all_users_success()
    {
        // Arrange
        ManagesUsers::shouldReceive('getAllUsers')->once()->andReturn($this->user);

        // Act
        $response = $this->call('GET', '/users');

        // Assert
        $this->assertResponseOk();
        $this->assertJson($response->getContent());
    }

    public function test_get_single_user_success()
    {
        // Arrange
        ManagesUsers::shouldReceive('getUserById')->once()->andReturn($this->user);

        // Act
        $response = $this->call('GET', '/users/1');

        // Assert
        $this->assertResponseOk();
        $this->assertJson($response->getContent());
    }

    public function test_register_user_success()
    {
        // Arrange
        ManagesUsers::shouldReceive('createNewUser')->once()->andReturn($this->user);

        $mock = Mockery::mock('RecipeNow\Models\Validation\RegistrationRules');
        $mock->shouldReceive('validate')->once()->andReturn(true);
        $this->app->instance('RecipeNow\Models\Validation\RegistrationRules', $mock);

        // Act
        $response = $this->call('POST', '/register');

        // Assert
        $this->assertResponseStatus(201);
        $this->assertJson($response->getContent());
    }


    public function test_login_user_success()
    {
        // Arrange
        ManagesUsers::shouldReceive('loginUser')->once()->andReturn($this->user);

        // Act
        $response = $this->call('POST', '/login');

        // Assert
        $this->assertResponseOk();
        $this->assertJson($response->getContent());
    }

    public function test_login_logout_success()
    {
        // Arrange
        ManagesUsers::shouldReceive('logoutUser')->once()->andReturn();

        // Act
        $response = $this->call('GET', '/logout');

        // Assert
        $this->assertResponseOk();
        $this->assertJson($response->getContent());
    }
}