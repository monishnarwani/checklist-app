<?php

use App\Http\Controllers\Controller;
use Checklist\src\Repositories\ChecklistRepository;

class ChecklistApiController extends Controller
{
    private $checklistRepository;

    public function __construct(ChecklistRepository $checklistRepository)
    {
//        $this->middleware('auth:api');
        $this->checklistRepository = $checklistRepository;
    }


}