<?php

namespace App\Validations\User\Content;


use App\Structures\Abstracts\ValidationAbstract;

class AddContent extends ValidationAbstract
{

    /**
     * @param $data
     * @return array
     */
    public function setRules($data): array
    {
        return [
//            'user_id' => ['required','int'],
            'subject' => ['required'],
            'content' => ['required']
        ];
    }

    public function setMessage($data): array
    {
        // TODO: Implement setMessage() method.
    }
}