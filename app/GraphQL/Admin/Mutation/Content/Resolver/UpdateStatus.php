<?php

namespace App\GraphQL\Admin\Mutation\Content\Resolver;


use App\Endpoints\Admin\Content;
use App\Structures\Abstracts\ResolverAbstract;

class UpdateStatus extends ResolverAbstract
{
    /**
     * @param $data
     * @param $context
     * @param $selectionField
     * @param $getSelectFields
     * @return array
     */
    public function endpointResolver($data, $context, $selectionField, $getSelectFields)
    {
        $resolver = new Content();

        return $resolver->statusUpdate($data, $getSelectFields);
    }

}