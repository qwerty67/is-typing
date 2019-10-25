<?php

namespace App\GraphQL\Admin\Query\Content\Resolver;


use App\Structures\Abstracts\ResolverAbstract;
use App\Endpoints\Admin\Content as ContentEndpoint;

class Content extends ResolverAbstract
{


    /**
     * @param $data
     * @param $context
     * @param $selectionField
     * @param $getSelectFields
     * @return \App\Model\Content[]|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|mixed
     */
    public function endpointResolver($data, $context, $selectionField, $getSelectFields)
    {
        $endpoint = new ContentEndpoint();

        return $endpoint->resolveContent($data, $getSelectFields);
    }
}