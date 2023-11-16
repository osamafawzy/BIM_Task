<?php


namespace Modules\Client\DTO;


class ClientDto
{

    public $name;
    public $email;
    public $password;
    public $verify_code;
    public $image;
    public $is_active;

    public function __construct($request)
    {

        $this->name = $request->get('name');
        $this->email = $request->get('email');
        if ($request->get('password')) $this->password =  bcrypt($request->get('password'));
        if ($request->hasFile('image')) $this->image   = $request->file('image');
        $this->is_active   = 1;
    }

    public function dataFromRequest()
    {
        $data =  json_decode(json_encode($this), true);
        if ($data['password'] == null) unset($data['password']);
        if ($data['image'] == null) unset($data['image']);
        return $data;
    }

}
