<?php


namespace App\Validations\User\User;



use App\Structures\Abstracts\ValidationAbstract;

class User extends ValidationAbstract
{


    /**
     * @param $data
     * @return array
     */
    public function setRules($data): array
    {
        return [
            'id' => ['required'],
        ];
    }

    public function setMessage($data): array
    {
        // TODO: Implement setMessage() method.
    }
}