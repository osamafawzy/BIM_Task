<?php


namespace Modules\Transaction\Service\Payment;


use Illuminate\Validation\Rule;


trait PaymentServiceHelper
{

    protected function validationCreate($data)
    {
        return validator($data,[
            'amount' => 'required|numeric',
            'transaction_id' => 'required|exists:transactions,id',
            'details' => 'sometimes|string'
        ]);
    }
    protected function validationUpdate($data)
    {
        return validator($data,[
            'amount' => 'required|numeric',
            'transaction_id' => 'required|exists:transactions,id',
            'details' => 'sometimes|string'
        ]);
    }
}
