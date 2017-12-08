<?php

namespace Checklist\Repositories;

interface ItemRepository
{
    public function createItem($inputData);

    public function getall();
}