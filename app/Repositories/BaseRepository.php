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
    public function create(array $payload = [])
    {
        return $this->model->create($payload);
        return $model->fresh();
    }
    public function update(int $id= 0, array $payload = [])
    {
        $model =$this-> findById($id);
        return $model->update($payload);
    }
    public function delete(int $id = 0)
    {
        return $this->findById($id)->delete();
    }
    public function forceDelete(int $id = 0)
    {
        return $this->findById($id)->forceDelete();
    }
    public function pagination(
        array $columns = ['*'],
        array $conditions = [],
        array $join = [],
        array $extend = [],
        int $perPage = 1,
        array $relations = []
    ){
        $query = $this->model->select($columns)->where(function($query) use ($conditions){
            if(isset($conditions['keyword']) && !empty($conditions['keyword'])){
                $query->where('name', 'LIKE','%'.$conditions['keyword'].'%')
                      ->orWhere('email', 'LIKE','%'.$conditions['keyword'].'%')
                      ->orWhere('phone', 'LIKE','%'.$conditions['keyword'].'%');
            }
        });
        //truy van so user cua catalogue
        if(isset($relations) && !empty($relations)){
            foreach($relations as $relation){
                $query->withCount($relation);
            }
        }
        if(!empty($join)){
            $query->join(...$join);
        }
        return $query->paginate($perPage)
        ->withQueryString()->withPath(env('APP_URL').$extend['path']);
    }

}
