<?php

namespace App\Repositories;

use App\Contracts\CategoryRepository;
use App\Models\Category;

class CategoryRepositoryImpl implements CategoryRepository
{
    protected $model;
    protected $categories;

    public function __construct()
    {
        $this->model  = new Category();
        $this->categories = Category::orderBy('id','desc')->get();
    }

    public function getAll()
    {
        return $this->categories;
    }

    public function create(array $data)
    {
//        dd($data);
        return $this->model->create($data);
    }

    public function update($id, array $data)
    {
        return $this->model->whereId($id)->update($data);
    }

    public function delete($id)
    {
        return $this->model->whereId($id)->delete();
    }
}
