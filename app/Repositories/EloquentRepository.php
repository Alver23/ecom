<?php
/**
 * Created by PhpStorm.
 * User: agrisales
 * Date: 12/08/17
 * Time: 11:26 AM
 */

namespace Ecom\Repositories;

use Illuminate\Database\Eloquent\Model;

abstract class EloquentRepository
{
    protected $model;

    public function __construct(Model $modelClass)
    {
        $this->model = $modelClass;
    }

    public function all()
    {
       return $this->model->get();
    }

    public function find($id)
    {
        return $this->model->find($id);
    }

    public function findManyBy(string $key, $value, array $attributes = ['*'], array $with = [])
    {
        return $this->model->with($with)->where($key, $value)->get($attributes);
    }

    public function create(array $data)
    {
        $model = $this->model->fill($data);
        $model->save();
        return $model;
    }

    public function update(int $id, array $data)
    {
        $model = $this->find($id);
        $model->update($data);
        return $model;
    }
}