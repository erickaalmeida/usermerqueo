<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\UseCases\AddUserUseCase;
use App\Repositories\Contracts\UserRepositoryInterface;
use App\User;

class UserCreateUseCaseTest extends TestCase
{
    /**
     * @var \Mockery\MockInterface|UserRepositoryInterface
     */
    private $userRepository;
    private $user;

    public function setUp(): void
    {
        parent::setUp(); // TODO: Change the autogenerated stub

        // set up repository user
        $this->user = \Mockery::mock('App\User');
        $this->app->instance('App\User', $this->user);
        $this->userRepository = \Mockery::mock(UserRepositoryInterface::class);
    }

    public function tearDown(): void
    {
        \Mockery::close();
        parent::tearDown(); // TODO: Change the autogenerated stub
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testUserCreate()
    {
        // $this->assertTrue(true);

        // $user = factory('App\User')->create();
        //
        $name = "Jhon doe";
        $email = "jdoe@merqueo.com";
        $password = "123456";

        $this->userRepository
            ->shouldReceive('addUser')
            ->with($name, $email, $password)
            ->andReturn($this->user);

        $usecase = new AddUserUseCase($this->userRepository);
        $result = $usecase->handle($name, $email, $password);

        //dd($this->user);

        $this->assertInstanceOf($this->user, $result);

    }
}
