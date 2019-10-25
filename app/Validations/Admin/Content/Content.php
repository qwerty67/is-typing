<?php

namespace App\Validations\Admin\Content;


use App\Structures\Abstracts\ValidationAbstract;

class Content extends ValidationAbstract
{

    /**
     * @param $data
     * @return array
     */
    public function setRules($data): array
    {
        return [];
    }

    public function setMessage($data): array
    {
        // TODO: Implement setMessage() method.
    }
}