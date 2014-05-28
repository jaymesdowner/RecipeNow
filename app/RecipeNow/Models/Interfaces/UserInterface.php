<?php namespace RecipeNow\Models\Interfaces;

interface UserInterface
{
    public function getAllUsers();
    public function getUserById($userId);
    public function createNewUser($input);
}