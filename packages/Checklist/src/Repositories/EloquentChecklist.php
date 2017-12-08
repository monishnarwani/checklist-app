<?php

namespace Checklist\Repositories;

use Checklist\Models\Checklist;

class EloquentChecklist implements ChecklistRepository
{

    protected $model;

    public function __construct(Checklist $checklist)
    {
        $this->model = $checklist;
    }

    public function createChecklist($inputData)
    {
        $checklist = new Checklist();
        $checklist->name = $inputData['name'];
        $checklist->created_by = $inputData['created_by'];
        $response = $checklist->save();

        if ($response) {
            return $checklist;
        }
        return false;
    }

    public function updateChecklist($inputData, $id)
    {

    }

    public function getById($id)
    {
        $checklist = $this->model->where('id', $id)->first();
        return $checklist;

    }
}