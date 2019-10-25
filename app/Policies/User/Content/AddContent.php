<?php
/**
 * Created by PhpStorm.
 * User: Taha
 * Date: 9/23/2019
 * Time: 9:44 PM
 */

namespace App\Policies\User\Content;


use App\Structures\Abstracts\PolicyAbstract;

class AddContent extends PolicyAbstract
{

    public function authorize($data)
    {
        return true;
    }
}