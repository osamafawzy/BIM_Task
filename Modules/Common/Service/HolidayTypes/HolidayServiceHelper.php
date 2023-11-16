<?php


namespace Modules\Common\Service\HolidayTypes;


use Illuminate\Validation\Rule;


trait HolidayServiceHelper
{

    protected function validationCreate($data)
    {
        return validator($data,[
            'title' => 'required|string',
            'days_number'=>'required|integer',
        ]);
    }
    protected function validationUpdate($data)
    {
        return validator($data,[
            'title' => 'required|string',
            'days_number' => 'required|integer',
        ]);
    }
}
