<?php
/**
 * Created by PhpStorm.
 * User: formation.invite
 * Date: 07/10/2015
 * Time: 11:40
 */

namespace ParkBundle\Tests\Services;

use ParkBundle\Services\Calculator;

class CalculatorServiceTest extends \PHPUnit_Framework_TestCase
{
    public function testSum()
    {
        $calculator = new Calculator();
        $this->assertEquals(6, $calculator->sum(4,2));
    }

}