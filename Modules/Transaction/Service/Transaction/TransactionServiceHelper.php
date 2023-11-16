<?php


namespace Modules\Transaction\Service\Transaction;


use Illuminate\Validation\Rule;


trait TransactionServiceHelper
{

    protected function validationCreate($data)
    {
        return validator($data,[
            'amount' => 'required|numeric',
            'client_id' => 'required|exists:clients,id',
            'due_on' => 'required|date',
            'vat' => 'required|numeric',
            'is_vat_inclusive' => 'required|boolean',
        ]);
    }
    protected function validationUpdate($data)
    {
        return validator($data,[
            'amount' => 'required|numeric',
            'client_id' => 'required|exists:clients,id',
            'due_on' => 'required|date',
            'vat' => 'required|numeric',
            'is_vat_inclusive' => 'required|boolean',
        ]);
    }
}
