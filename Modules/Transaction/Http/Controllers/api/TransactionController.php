<?php

namespace Modules\Transaction\Http\Controllers\api;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\School\Service\Hall\HallService;
use Modules\School\Service\School\SchoolService;
use Modules\Transaction\DTO\TransactionDto;
use Modules\Transaction\Service\Transaction\TransactionService;

class TransactionController extends Controller
{
    private $transactionService;

    public function __construct()
    {
        $this->transactionService = new TransactionService();
        $this->middleware('auth:admin_api')->only('store','index');
        $this->middleware('auth:client')->only('client_index');
    }


    public function store(Request $request){
        $data = (new TransactionDto($request))->dataFromRequest();
        return $this->transactionService->create($data);
    }

    public function index(Request $request){
        return $this->transactionService->all($request->all(),['payments']);
    }

    public function client_index(Request $request){
        $data = $request->all();
        $data['client_id'] = auth('client')->id();
        return $this->transactionService->all($data,['payments']);
    }


}
