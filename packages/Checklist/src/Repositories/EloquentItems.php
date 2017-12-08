<?php

namespace Checklist\src\Repositories;
use Checklist\src\Models\Item;

class EloquentItems implements ItemRepository
{
    protected $model;

    public function __construct( Item $item)
    {
        $this->model = $item;
    }
    public function CreateItem()
    {
        //return $this->model->create($item);
    }

    public function getall()
    {
        //return $this->model->all($item);
    }
}