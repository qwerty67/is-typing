<?php

namespace App\Policies\Admin\User;

use App\Structures\Abstracts\PolicyAbstract;

class User extends PolicyAbstract
{

    public function authorize()
    {
        return true;
//        return $this->adminMustBeAuthenticated();
    }

}