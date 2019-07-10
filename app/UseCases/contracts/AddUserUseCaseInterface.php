<?php

namespace App\UseCases\Contracts;

interface AddUserUseCaseInterface {
    //
    public function handle($name, $email, $password);
}