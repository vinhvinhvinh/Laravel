<?php

namespace App\Repositories;

use App\Contracts\BaseContract;
use Illuminate\Database\Eloquent\Model;

class BaseRepository implements BaseContract
{
    protected $models;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function create(array $attribute)
    {
        return $this->model->create($attribute);
    }


    public function all($column = array('*'), string $orderBy = 'id', string $sortBy = 'desc')
    {
        return $this->model->orderBy($orderBy, $sortBy)->get($column);
    }


    public function update(array $attribute, int $id)
    {
        return $this->find($id)->update($attribute);
    }


    public function find(int $id)
    {
        return $this->model->find($id);
    }



    public function findOneOrFail(int $id)
    {
        return $this->model->findOneOrFail($id);
    }


    public function findBy(array $data)
    {
        return $this->model->where($data)->all();
    }


    public function findOneBy(array $data)
    {
        return $this->model->where($data)->first();
    }


    public function findOneByOrFail(array $data)
    {
        return $this->model->where($data)->firstOrFail();
    }


    public function delete(int $id)
    {
        return $this->model->find($id)->delete();
    }
}