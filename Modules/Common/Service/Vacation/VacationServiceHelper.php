<?php


namespace Modules\Common\Service\Vacation;


use Illuminate\Validation\Rule;


trait VacationServiceHelper
{

    protected function validationCreate($data)
    {
        return validator($data,[
            'title' => 'required|string',
            'date'=>'required',
            'school_id'=>'required',
        ],[
            'school_id.required' => 'حقل المدرسه مطلوب'
        ]);
    }
    protected function validationUpdate($data)
    {
        return validator($data,[
            'title' => 'required|string',
            'date' => 'required',
            'school_id' => 'required',
        ]);
    }
}
