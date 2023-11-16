<?php


namespace Modules\Common\Service\Violation;


use Illuminate\Validation\Rule;


trait ViolationServiceHelper
{

    protected function validationCreate($data)
    {
        return validator($data,[
            'title' => 'required|string'
        ]);
    }
    protected function validationUpdate($data)
    {
        return validator($data,[
            'title' => 'required|string'
        ]);
    }
}
