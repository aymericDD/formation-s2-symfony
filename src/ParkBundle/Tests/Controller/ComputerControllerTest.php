<?php

namespace ParkBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ComputerControllerTest extends WebTestCase
{
    public function testComputerlist()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/park/computer/');
    }

}
