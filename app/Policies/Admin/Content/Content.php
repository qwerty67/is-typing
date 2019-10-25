<?php

namespace App\Policies\Admin\Content;


use App\Structures\Abstracts\PolicyAbstract;

class Content extends PolicyAbstract
{

    /**
     * @return bool
     */
    public function authorize()
    {
        return true;
//        return $this->adminMustBeAuthenticated();
    }

}