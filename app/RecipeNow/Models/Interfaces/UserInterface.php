<?php namespace RecipeNow\Interfaces;

interface UserInterface
{
    public function getAllUsers();
    public function getUserById($userId);
    public function createNewUser($input);
}