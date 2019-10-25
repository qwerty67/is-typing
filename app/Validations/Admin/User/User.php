<?php


namespace App\Validations\Admin\User;


use App\Structures\Abstracts\ValidationAbstract;

class User extends ValidationAbstract
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