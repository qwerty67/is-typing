<?php

namespace App\Structures\Interfaces\Repository;

/**
 * Interface UserRepository
 *
 * @package Structures\Interfaces\Repository
 */
interface UserInterface
{
    /**
     * @param $income
     * @return mixed
     */
    public function findById($income);

    /**
     * @param $income
     * @return mixed
     */
    public function SignUp($income);

    /**
     * @param $income
     * @return mixed
     */
    public function login($income);

    /**
     * @param $income
     * @return mixed
     */
    public function getAllUser($income);


}