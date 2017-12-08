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
    public function  CreateAudit($inputdata)
    {
        $audit = new audit();
        $audit->name = $inputdata['name'];
        $audit->created_by = $inputdata['created_by'];
        $audit->checklist_id = $inputdata['checklist_id'];
        $audit->users = $inputdata['users'];
        $audit->status = $inputdata['status'];
        $audit->project_id = $inputdata['project_id'];
        $response = $audit->save();

        if ($response) {
            return $audit;
        }
        return false;
    }

}