<?php


namespace Modules\Transaction\DTO;


use Carbon\Carbon;

class PaymentDto
{

    public $amount;
    public $details;
    public $transaction_id;


    public function __construct($request)
    {

        $this->amount = $request->get('amount');
        $this->details = $request->get('details');
        $this->transaction_id = $request->get('transaction_id');

    }

    public function dataFromRequest()
    {
        $data =  json_decode(json_encode($this), true);
        return array_filter($data);
    }

}
