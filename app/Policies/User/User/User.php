<?php

namespace App\Policies\User\User;


use Illuminate\Support\Facades\Auth;
use App\Structures\Abstracts\PolicyAbstract;

class User extends PolicyAbstract
{
    public function readUserId()
    {
        //todo ! Auth::guest();
        return  Auth::guest();
    }

}