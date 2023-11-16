<?php


namespace Modules\Client\Validation;


trait ClientValidation
{
    protected function validateStoreClient($data)
    {
        return validator($data, [
            'name' => 'required|max:191',
            'email' => 'required|unique:clients,email',
            'password' => 'required|min:6|max:191',
        ]);
    }

    protected function validateUpdateClient($data, $id)
    {
        validator($data, [
            'name' => 'required|max:191',
            'email' => 'required|unique:clients,email,' . $id,
        ]);
    }

    protected function validateLogin($data)
    {
        return validator($data, [
            'email' => 'required|exists:clients,email',
            'password' => 'required',
        ]);
    }


}
