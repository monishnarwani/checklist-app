<?php

namespace Checklist\Repositories;

interface ChecklistRepository
{
    public function createChecklist($inputData);

    public function updateChecklist($inputData, $id);

    public function getById($id);
}