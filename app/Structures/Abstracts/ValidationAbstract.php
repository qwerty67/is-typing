<?php
namespace App\Structures\Abstracts;


abstract class ValidationAbstract
{


    /**
     * @param $data
     * @return array
     */
    abstract public function setRules($data): array ;
    abstract public function setMessage($data): array ;


}