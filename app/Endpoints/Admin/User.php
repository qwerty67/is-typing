<?php

namespace App\Endpoints\Admin;


use App\Structures\Abstracts\EndpointAbstract;
use App\Structures\Interfaces\Repository\UserInterface;

class User extends EndpointAbstract
{

    /**
     * Return the access level of the class by directly address to access level enum.
     *
     * @return string
     */
    protected function accessLevel()
    {
        return 'Admin';
    }


    /**
     * @param $data
     * @return \App\User[]|\Illuminate\Database\Eloquent\Collection|mixed
     */
    public function getAllUser($data)
    {
        /** @var \App\Repository\User\UserRepository $repo */
        $repo = app(UserInterface::class);

        return $repo->getAllUser($data);

    }

}