<?php

namespace App\GraphQL\User\Mutation\User\Resolver;

use App\Endpoints\User\User;
use App\Structures\Abstracts\ResolverAbstract;

class Login extends ResolverAbstract
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
        $endpoint = new User();
        return $endpoint->login($data);
    }
}