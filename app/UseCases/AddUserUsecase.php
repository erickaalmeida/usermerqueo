<?php

namespace App\UseCases;

use App\UseCases\Contracts\AddUserUseCaseInterface;
use App\Repositories\Contracts\UserRepositoryInterface;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;


class AddUserUseCase implements AddUserUseCaseInterface {

    use RefreshDatabase;

    private $userRepository;

    public function __construct(UserRepositoryInterface $userRepository) {
        $this->userRepository = $userRepository;
    }

    public function handle($name, $email, $password): User {
        //
        //dd('user');
        return $this->userRepository->addUser($name, $email, $password);
    }
}