<?php

namespace App\Repositories\Contracts;

interface UserRepositoryInterface {
    public function addUser($name, $email, $password);
}