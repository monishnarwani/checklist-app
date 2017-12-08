<?php

namespace Checklist\Repositories;

use Checklist\Models\Item;

class EloquentItems implements ItemRepository
{
    protected $model;

    public function __construct( Item $item)
    {
        $this->model = $item;
    }
    public function CreateItem($inputData)
    {
        $item = new Item();
        $item->name = $inputData['name'];
        $item->created_by = $inputData['created_by'];
        $item->save();

        return $item;
    }

    public function getall()
    {
        return $this->model->all();
    }
}