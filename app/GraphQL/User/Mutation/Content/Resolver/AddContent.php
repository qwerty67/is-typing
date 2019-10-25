<?php

namespace App\GraphQL\User\Mutation\Content\Resolver;


use App\Endpoints\User\Content;
use App\Structures\Abstracts\ResolverAbstract;

class AddContent extends ResolverAbstract
{

    /**
     * @param $data
     * @param $context
     * @param $selectionField
     * @param $getSelectFields
     * @return mixed
     * @throws \Exception
     */
    public function endpointResolver($data, $context, $selectionField, $getSelectFields)
    {
        $endpoint = new Content();
        return $endpoint->addContent($data);
    }
}