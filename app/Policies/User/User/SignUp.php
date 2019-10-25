<?php

namespace App\Policies\User\User;


use Illuminate\Support\Facades\Auth;
use App\Structures\Abstracts\PolicyAbstract;

class SignUp extends PolicyAbstract
{
    public function authorize($data)
    {
        return Auth::guest();
    }
}