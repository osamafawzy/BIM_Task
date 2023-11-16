<?php


namespace Modules\Common\Service\News;


use Illuminate\Validation\Rule;
use Modules\Notification\Rules\urlRule;


trait NewsServiceHelper
{

    protected function validationCreate($data)
    {
        return validator($data, [
            'title' => 'required',
            'description' => 'required',
            'image' => 'required',
            'url' => ['nullable', new urlRule]

        ]);
    }
    protected function validationUpdate($data)
    {
        return validator($data, [
            'title' => 'required',
            'description' => 'required',
            'url' => ["nullable", new urlRule]
        ]);
    }
}
