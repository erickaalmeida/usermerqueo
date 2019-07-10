<?php

namespace App\Providers;

use App\Repositories\Contracts\ProductRepositoryInterface;
use Illuminate\Support\ServiceProvider;
use App\Repositories\Contracts\UserRepositoryInterface;
use App\UseCases\Contracts\AddUserUseCaseInterface;
use App\Repositories\UserRepository;
use App\UseCases\AddUserUseCase;


class ContractsServiceProvider extends ServiceProvider
{
    private $classes = [
        //Repositories
        UserRepositoryInterface::class => UserRepository::class,

        //Usescases
        AddUserUseCaseInterface::class => AddUserUseCase::class,
    ];


    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        foreach ($this->classes as $interface => $implementation) {
            $this->app->bind($interface, $implementation);
        }
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {

    }
}
