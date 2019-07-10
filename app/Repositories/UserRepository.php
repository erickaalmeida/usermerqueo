<?php

namespace App\Repositories;

use App\User;

class UserRepository implements UserRepositoryInterface {
    public function addUser($name, $email, $password){
        // Save user
        $user = new User();
        $user->name = $name;
        $user->email = $email;
        $user->password = bcrypt($password);
        $user->save();

        return $user;
    }
}