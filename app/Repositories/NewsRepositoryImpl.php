<?php

namespace App\Repositories;

use App\Contracts\CategoryRepository;
use App\Models\News;

class NewsRepositoryImpl implements CategoryRepository
{
    protected $model;
    protected $news;

    public function __construct()
    {
        $this->model  = new News();
        $this->news = News::orderBy('id','desc')->get();
    }

    public function getAll()
    {
        return $this->news;
    }

    public function create(array $data)
    {
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
