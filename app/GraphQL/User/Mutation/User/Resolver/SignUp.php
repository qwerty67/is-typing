<?php


namespace App\GraphQL\User\Mutation\User\Resolver;


use App\Endpoints\User\User;
use App\Structures\Abstracts\ResolverAbstract;

class SignUp extends ResolverAbstract
{

    /**
     * @param $data
     * @param $context
     * @param $selectionField
     * @return mixed
     */
    public function endpointResolver($data, $context, $selectionField, $getSelectFields)
    {
        $endpoint = new User();
        return $endpoint->SignUp($data);

    }
}