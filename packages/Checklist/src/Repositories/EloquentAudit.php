<?php
/**
 * Created by PhpStorm.
 * User: Naqiyah
 * Date: 12/8/2017
 * Time: 4:49 PM
 */
namespace Checklist\Repositories;

use Checklist\Models\Audit;

class EloquentAudit implements AuditRepository
{
    protected $model;

    public function __construct( Audit $audit)
    {
        $this->model = $audit;
    }
    public function  CreateAudit($inputData)
    {
        $audit = new audit();
        $audit->name = $inputData['name'];
        $audit->created_by = $inputData['created_by'];
        $audit->checklist_id = $inputData['checklist_id'];
        $audit->users = $inputData['users'];
        $audit->status = $inputData['status'];
        $audit->project_id = $inputData['project_id'];
        $response = $audit->save();

        if ($response) {
            return $audit;
        }
        return false;
    }

    public function GetById($Id)
    {
        //
    }
}