<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Interfaces\UserRepositoryInterface;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    /**
     * Create a new class instance.
     */
    protected $model;
    public function __construct(User $model)
    {
        $this->model = $model;
    }
    public function getAllPaginate()
    {
        return User::paginate(15);
    }
}
