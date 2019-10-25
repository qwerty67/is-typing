<?php

namespace App\GraphQL\User\Query\User\Resolver;


use App\Endpoints\User\User as UserEndpoint;
use App\Structures\Abstracts\ResolverAbstract;

class User extends ResolverAbstract
{
    private  $income;
    /**
     * Return the access level of the class by directly address to access level enum.
     *
     * @return string
     */
    protected function accessLevel()
    {
        // TODO: Implement accessLevel() method.
    }

    /**
     * @param $data
     * @param $context
     * @param $selectionField
     * @return mixed
     */
    public function endpointResolver($data, $context, $selectionField, $getSelectFields)
    {
        $endpoint = new UserEndpoint();

        return $endpoint->readUserById($data);
    }
}