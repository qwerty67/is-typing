<?php

namespace App\Validations\User\User;


use App\Structures\Abstracts\ValidationAbstract;

class SignUp extends ValidationAbstract
{

    /**
     * @param $data
     * @return array
     */
    public function setRules($data): array
    {
//        $this->setMessage($data);

        return [
            'name' => ['required'],
            'email' => ['required', 'email', 'unique:users']
        ];


    }


    //todo repair setMessage()
    /**
     * @param $data
     * @return array
     */
    public function setMessage($data): array
    {
        return [
            'name.required' => 'Please enter your full name',
            'name.string' => 'Your name must be a valid string',
            'email.required' => 'Please enter your email address',
            'email.email' => 'Please enter a valid email address',
            'email.unique' => 'Sorry, this email address is already in use',
        ];
    }
}