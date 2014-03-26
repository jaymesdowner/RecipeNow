<?php

use RecipeNow\Models\User;
use RecipeNow\Facades\ManagesUsers;

class UsersControllerTest extends TestCase {

    protected $mock;
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

    public function test_get_all_users_throw_exception_404()
    {
        // Arrange
        ManagesUsers::shouldReceive('getAllUsers')->once()->andThrow(new Mockery\Exception);

        // Act
        $response = $this->call('GET', '/users');

        // Assert
        $this->assertResponseStatus(404);
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

    public function test_get_single_user_throw_exception_404()
    {
        // Arrange
        ManagesUsers::shouldReceive('getUserById')->once()->andThrow(new Mockery\Exception);

        // Act
        $response = $this->call('GET', '/users/1');

        // Assert
        $this->assertResponseStatus(404);
        $this->assertJson($response->getContent());
    }

    public function test_register_user_success()
    {
        // Arrange
        ManagesUsers::shouldReceive('createNewUser')->once()->andReturn($this->user);

        // Act
        $response = $this->call('POST', '/register');

        // Assert
        $this->assertResponseStatus(201);
        $this->assertJson($response->getContent());
    }

    public function test_register_user_throw_exception_401()
    {
        // Arrange
        ManagesUsers::shouldReceive('createNewUser')->once()->andThrow(new Mockery\Exception);

        // Act
        $response = $this->call('POST', '/register');

        // Assert
        $this->assertResponseStatus(401);
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

    public function test_login_user_authorization_fail_throw_exception_403()
    {
        // Arrange
        ManagesUsers::shouldReceive('loginUser')->once()->andThrow(new Mockery\Exception);

        // Act
        $response = $this->call('POST', '/login');

        // Assert
        $this->assertResponseStatus(403);
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