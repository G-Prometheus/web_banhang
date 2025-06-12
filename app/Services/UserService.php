<?php

namespace App\Services;


use App\Repositories\UserRepository;
use App\Services\Interfaces\UserServiceInterface;
class UserService implements UserServiceInterface
{
    /**
     * Create a new class instance.
     */
    protected $userRepository;
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }
    public function paginate()
    {
        $users = $this->userRepository->getAllPaginate();
        return $users;
    }
}
