<?php

namespace Checklist\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Checklist\Repositories\ItemRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ItemsApiController extends Controller
{
    private $itemRepository;
    public function __construct(ItemRepository $itemRepository)
    {
//          $this->middleware('auth:api');
        $this->itemRepository = $itemRepository;
    }
    public function create(Request $request)
    {
        $validationRules = [
            'name' => 'required',
            'created_by' => 'required'
        ];

        $validationMessage = [
            'name.required' => getConfig('messages.checklist.name_required'),
            'created_by.required' => getConfig('messages.checklist.createdby_required'),
        ];

        $validator = Validator::make($request->all(), $validationRules, $validationMessage);

        if ($validator->fails()) {
            return getApiResponse(false, getConfig('messages.global.validate'), getConfig('messages.global.validate'), [], $validator->errors(),422);
        }


        $inputData = [
            'name' => $request->input('name'),
            'created_by' => $request->input('created_by')
        ];

        $item = $this->itemRepository->createItem($inputData);

        return getApiResponse(true, getConfig('messages.checklist.save'), getConfig('messages.checklist.save'), $item, [], 201);

    }
    public function getItems()
    {
        $items = $this->itemRepository->getall();
        return getApiResponse(true, getConfig('messages.checklist.save'), getConfig('messages.checklist.save'), $items, [], 201);
    }
}