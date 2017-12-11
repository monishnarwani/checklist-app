<?php

namespace Checklist\Repositories;

interface AuditRepository
{
    public function CreateAudit($inputData);

    public function getById($id);
}