<?php

namespace App\Services;


abstract class BaseCrudService
{
    protected $model;

    public function __construct($model)
    {
        $this->model = $model;
    }

    public function index()
    {
        return $this->model::all();
    }

    public function store($data)
    {
        return $this->model::create($data);
    }

    public function update($id, $data)
    {
        $resourse = $this->model::findOrFail($id);
        $resourse->update($data);
        return $resourse;
    }

    public function destroy($id)
    {
        $resourse = $this->model::findOrFail($id);
        $resourse->delete();
        return $resourse;
    }
}
