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
    public function findById(int $modelId, array $columns = ['*'],array $relations = [])
    {
        return $this->model->select($columns)->with($relations)->findOrFail($modelId, $columns);
    }

}
