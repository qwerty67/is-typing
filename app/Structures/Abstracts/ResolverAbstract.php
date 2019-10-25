<?php


namespace App\Structures\Abstracts;


abstract class ResolverAbstract
{
    /**
     * @param $data
     * @param $context
     * @param $selectionField
     * @param $getSelectFields
     * @return mixed
     */
    abstract public function endpointResolver($data, $context, $selectionField, $getSelectFields);
}