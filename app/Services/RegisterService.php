<?php
namespace App\Services;
use App\Models\User;

class RegisterService
{
    public static function createUser($data){
       return User::create($data);
    }
}