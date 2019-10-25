<?php

namespace App\Structures\Interfaces\Repository;


interface ContentInterface
{

    /**
     * @param $income
     * @return mixed
     */
    public function addContent($income);


    /**
     * @param $income
     * @param $getSelectFields
     * @return mixed
     */
    public function getAllContent($income, $getSelectFields);

    /**
     * @param $income
     * @param $getSelectFields
     * @return array
     */
    public function UpdateStatus($income, $getSelectFields);

}