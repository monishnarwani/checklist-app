<?php

use App\Http\Controllers\Controller;
use Checklist\src\Repositories\ItemRepository;

class ItemsApiController extends Controller
{
    private $itemRepository;
    public function __construct(ItemRepository $itemRepository)
    {
//          $this->middleware('auth:api');
        $this->itemRepository = $itemRepository;
    }
    public function create()
    {
            //
    }
    public function show()
    {
            //
    }
}