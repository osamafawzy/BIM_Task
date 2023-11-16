<?php


namespace Modules\Common\Service\Subject;


use Illuminate\Validation\Rule;


trait SubjectServiceHelper
{

    protected function validationCreate($data)
    {
        return validator($data,[
            'title' => 'required',
        ]);
    }
    protected function validationUpdate($data)
    {
        return validator($data,[
            'title' => 'required',
        ]);
    }
}
