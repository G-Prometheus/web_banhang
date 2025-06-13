<?php
namespace App\Repositories;

use App\Repositories\Interfaces\BaseRepositoryInterface;
use Faker\Provider\Base;
use Illuminate\Database\Eloquent\Model;

class BaseRepository implements BaseRepositoryInterface
{
    protected $model;
    public function __construct(Model $model) {
        $this->model = $model;
    }

    public function getAll()
    {
        return $this->model->all();
    }
}
