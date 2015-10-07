<?php
/**
 * Created by PhpStorm.
 * User: formation.invite
 * Date: 07/10/2015
 * Time: 10:36
 */

namespace ParkBundle\Services;


class Calculator
{
    /**
     *
     *
     * @param   int   $arg1
     * @param   int   $arg2
     * @return mixed sum two variable
     */
    public function sum($arg1, $arg2)
    {
        return $arg1 + $arg2;
    }

    /**
     *
     *
     * @param   int     $arg1
     * @param   int     $arg2
     *
     * @return float
     */
    public function div($arg1, $arg2)
    {
        return $arg1/$arg2;
    }
}