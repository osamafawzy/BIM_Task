<?php


namespace Modules\Transaction\DTO;


use Carbon\Carbon;

class TransactionDto
{

    public $amount;
    public $due_on;
    public $vat;
    public $is_vat_inclusive;
    public $client_id;


    public function __construct($request)
    {

        $this->amount = $request->get('amount');
        $this->due_on = $request->get('due_on');
        $this->vat = $request->get('vat');
        $this->is_vat_inclusive = $request->get('is_vat_inclusive');
        $this->client_id = $request->get('client_id');

    }

    public function dataFromRequest()
    {
        $data =  json_decode(json_encode($this), true);
        if (Carbon::today()->greaterThan(Carbon::parse($data['due_on']))){
            $data['status'] = 'Overdue';
        }else{
            $data['status'] = 'Outstanding';
        }
        return $data;
    }

}
