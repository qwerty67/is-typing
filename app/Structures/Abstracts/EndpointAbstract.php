<?php

namespace App\Structures\Abstracts;

/**
 * Class EndpointAbstract
 *
 * @package Structure\Abstracts
 */

Abstract class EndpointAbstract
{

    private $income;

    /**
     * Return the access level of the class by directly address to access level enum.
     *
     * @return string
     */
    abstract protected function accessLevel();

}