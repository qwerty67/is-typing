<?php


namespace App\Endpoints\User;


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
     * @param $income
     * @return mixed
     * @throws \Exception
     */
    public function addContent($income)
    {
        /** @var \App\Repository\Content\ContentRepository $repository */
        $repository = app(ContentInterface::class);

        return $repository->addContent($income);
    }
}