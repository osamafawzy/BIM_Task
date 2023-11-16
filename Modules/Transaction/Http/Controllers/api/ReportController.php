<?php

namespace Modules\Transaction\Http\Controllers\api;

use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Transaction\Entities\Transaction;

class ReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin_api');
    }

    public function index(Request $request){
        $months = CarbonPeriod::create(Carbon::parse($request['date_from']),'1 month',Carbon::parse($request['date_to']));
        $transactions = Transaction::query()->whereBetween('due_on',[Carbon::parse($request['date_from']),Carbon::parse($request['date_to'])]);
        $response = [];
        foreach ($months as $key => $month){
            $response[$key]['paid'] = (clone $transactions)->whereMonth('due_on',$month->format('m'))->where('status','Paid')->sum('amount');
            $response[$key]['outstanding'] = (clone $transactions)->whereMonth('due_on',$month->format('m'))->where('status','Outstanding')->sum('amount');
            $response[$key]['overdue'] = (clone $transactions)->whereMonth('due_on',$month->format('m'))->where('status','Overdue')->sum('amount');
            $response[$key]['year'] = $month->format('Y');
            $response[$key]['month'] = $month->format('m');
        }

        return return_msg(true,'Report Data',$response);
    }


}
