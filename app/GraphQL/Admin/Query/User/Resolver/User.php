<?php

namespace App\GraphQL\Admin\Query\User\Resolver;


use App\Endpoints\Admin\User as UserEndpoint;
use App\Structures\Abstracts\ResolverAbstract;

class User extends ResolverAbstract
{

    /**
     * @param $data
     * @param $context
     * @param $selectionField
     * @param $getSelectFields
     * @return mixed
     */
    public function endpointResolver($data, $context, $selectionField, $getSelectFields)
    {
        $endpoint = new UserEndpoint();

        return $endpoint->getAllUser($data);
    }
}