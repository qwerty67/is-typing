<?php

namespace App\Policies\Admin\Content;


use App\Structures\Abstracts\PolicyAbstract;

class UpdateStatus extends PolicyAbstract
{
    /**
     * @return bool
     */
    public function authorize($data)
    {
        return true;
//        return $this->adminMustBeAuthenticated();
    }
}