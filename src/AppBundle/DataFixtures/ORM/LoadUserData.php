<?php
/**
 * Created by PhpStorm.
 * User: formation.invite
 * Date: 15/10/2015
 * Time: 15:13
 */

namespace ParkBundle\DataFixtures\ORM;

use Hautelook\AliceBundle\Alice\DataFixtureLoader;
use Nelmio\Alice\Fixtures;

class LoadComputerData extends DataFixtureLoader
{
    protected function getFixtures()
    {
        return array(
            __DIR__ . '/user.yml'
        );
    }
}