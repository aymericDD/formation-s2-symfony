<?php

namespace ParkBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ComputerControllerTest extends WebTestCase
{
    public function testSumAction()
    {
        // Init variable to check sum function
        $var1 = 5;
        $var2 = 6;
        $sum = $var1 + $var2;

        // Create client
        $client = static::createClient();

        $crawler = $client->request('GET', '/park/computer/calculator/' . $var1 . '/' . $var2);

        // Check if status page is equal to 200
        $this->assertEquals(
            200,
            $client->getResponse()->getStatusCode(),
            "/park/computer/calculator/" . $var1 . "/" . $var2
        );

        // Check if result in dom is good
        $this->assertEquals(
            $sum,
            $crawler->filter('div.result')->text(),
            'Target div.result does not contain correct result for ' . $var1 . ' + ' . $var2 . ' = ' . $sum
        );

    }
    /*
    public function testCompleteScenario()
    {
        // Create a new client to browse the application
        $client = static::createClient();

        // Create a new entry in the database
        $crawler = $client->request('GET', '/computer/');
        $this->assertEquals(200, $client->getResponse()->getStatusCode(), "Unexpected HTTP status code for GET /computer/");
        $crawler = $client->click($crawler->selectLink('Create a new entry')->link());

        // Fill in the form and submit it
        $form = $crawler->selectButton('Create')->form(array(
            'parkbundle_computer[field_name]'  => 'Test',
            // ... other fields to fill
        ));

        $client->submit($form);
        $crawler = $client->followRedirect();

        // Check data in the show view
        $this->assertGreaterThan(0, $crawler->filter('td:contains("Test")')->count(), 'Missing element td:contains("Test")');

        // Edit the entity
        $crawler = $client->click($crawler->selectLink('Edit')->link());

        $form = $crawler->selectButton('Update')->form(array(
            'parkbundle_computer[field_name]'  => 'Foo',
            // ... other fields to fill
        ));

        $client->submit($form);
        $crawler = $client->followRedirect();

        // Check the element contains an attribute with value equals "Foo"
        $this->assertGreaterThan(0, $crawler->filter('[value="Foo"]')->count(), 'Missing element [value="Foo"]');

        // Delete the entity
        $client->submit($crawler->selectButton('Delete')->form());
        $crawler = $client->followRedirect();

        // Check the entity has been delete on the list
        $this->assertNotRegExp('/Foo/', $client->getResponse()->getContent());
    }

    */
}
