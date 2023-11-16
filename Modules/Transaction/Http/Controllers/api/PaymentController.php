<?php

namespace Modules\Transaction\Http\Controllers\api;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\School\Service\Hall\HallService;
use Modules\School\Service\School\SchoolService;
use Modules\Transaction\DTO\PaymentDto;
use Modules\Transaction\DTO\TransactionDto;
use Modules\Transaction\Service\Payment\PaymentService;
use Modules\Transaction\Service\Transaction\TransactionService;

class PaymentController extends Controller
{
    private $paymentService;

    public function __construct()
    {
        $this->paymentService = new PaymentService();
        $this->middleware('auth:admin_api')->only('store','index');
    }


    public function store(Request $request){
        $data = (new PaymentDto($request))->dataFromRequest();
        return $this->paymentService->create($data);
    }

    public function index(Request $request){
        return $this->paymentService->all($request->all());
    }


}
