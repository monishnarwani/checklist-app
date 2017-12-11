<?php
/**
 * Created by PhpStorm.
 * User: Naqiyah
 * Date: 12/8/2017
 * Time: 4:56 PM
 */

namespace Checklist\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Checklist\Repositories\AuditRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class AuditApiController extends Controller{

    private $auditRepository;
    public function  __contruct(AuditRepository $auditRepository)
    {
        $this->auditRepository = $auditRepository;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function create(Request $request)
    {
        $validationRules = [
            'name' => 'required',
            'created_by' => 'required',
            'checklist_id'=>'required',
            'users'=>'required',
            'status'=>'required',
            'project_id'=>'required'
        ];

        $validationMessage = [
            'name.required' => getConfig('messages.audit.name_required'),
            'created_by.required' => getConfig('messages.audit.createdby_required'),
            'checklistid.required' =>getConfig('messages.audit.checklistid_required'),
            'user.required' => getConfig('messages.audit.users_assigned'),
            'status'=> getConfig('messages.audit.status'),
            'projectid.required' => getConfig('messages.audit.projectid_required')

        ];

        $validator = Validator::make($request->all(), $validationRules, $validationMessage);

        if ($validator->fails()) {
            return getApiResponse(false, getConfig('messages.global.validate'), getConfig('messages.global.validate'), [], $validator->errors(),422);
        }

        $inputData = [
            'name' => $request->input('name'),
            'created_by' => $request->input('created_by'),
            'checklist_id' => $request->input('checklist_id'),
            'users' => $request ->input('users'),
            'status' => $request-> input('status'),
            'project_id'=> $request ->input('project_id')
        ];

        try {

            DB::beginTransaction();

            $audit = $this->auditRepository->CreateAudit($inputData); // returns audit obj if success, else returns false

            DB::commit();

        } catch (Exception $exception) {

            DB::rollBack();
            \Log::info($exception->getMessage());
            return getApiResponse(false, getConfig('messages.audit.fail'), getConfig('messages.audit.fail'), [], $exception->getMessage(),422);
        //        return "hello";
        }

        return getApiResponse(true, getConfig('messages.audit.save'), getConfig('messages.checklist.save'),$audit, [], 201);
    }


}