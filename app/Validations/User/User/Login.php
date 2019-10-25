<?php

namespace App\Validations\User\User;


use App\Structures\Abstracts\ValidationAbstract;

class Login extends ValidationAbstract
{

    /**
     * @param $data
     * @return array
     */
    public function setRules($data): array
    {
        return  [
          'username' => ['required'],
          'password' => ['required']
        ];
    }

    public function setMessage($data): array
    {
        // TODO: Implement setMessage() method.
    }
}