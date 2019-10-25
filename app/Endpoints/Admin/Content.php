<?php

namespace App\Endpoints\Admin;


use App\Structures\Abstracts\EndpointAbstract;
use App\Structures\Interfaces\Repository\ContentInterface;

class Content extends EndpointAbstract
{

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
     * @param $getSelectFields
     * @return array
     */
    public function resolveContent($data, $getSelectFields)
    {
        /** @var \App\Repository\Content\ContentRepository $repo */
        $repo = app(ContentInterface::class);

        return $repo->getAllContent($data, $getSelectFields);
    }

    /**
     * @param $data
     * @param $getSelectFields
     * @return array
     */
    public function statusUpdate($data, $getSelectFields)
    {
        /** @var \App\Repository\Content\ContentRepository $repo */
        $repo = app(ContentInterface::class);

        return $repo->updateStatus($data, $getSelectFields);
    }
}