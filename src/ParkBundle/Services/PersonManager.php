<?php

namespace ParkBundle\Services;

use Doctrine\Bundle\DoctrineBundle\Registry;

/**
 * Class PersonManager
 * @package ParkBundle\Services
 */
class PersonManager
{
    /**
     * @var Registry
     */
    protected $doctrine;

    /**
     * PersonManager constructor.
     * @param $doctrine
     */
    public function __construct(Registry $doctrine)
    {
        $this->doctrine = $doctrine;
    }

    /**
     * Return all persons
     *
     * @return array|\ParkBundle\Entity\Person[]
     */
    public function getAllPersons()
    {
        return $this->doctrine->getRepository("ParkBundle:Person")->findAll();
    }
}