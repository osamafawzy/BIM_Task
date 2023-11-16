<?php


namespace Modules\Common\Service\TeacherLevels;


use Illuminate\Validation\Rule;


trait TeacherLevelsServiceHelper
{

    protected function validationCreate($data)
    {
        return validator($data,[
            'title' => 'required',
            'for' => 'required|in:teacher,administrative'
        ]);
    }
    protected function validationUpdate($data)
    {
        return validator($data,[
            'title' => 'required',
            'for' => 'required|in:teacher,administrative'
        ]);
    }
}
