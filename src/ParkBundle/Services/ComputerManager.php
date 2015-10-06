<?php

namespace ParkBundle\Services;

use \Doctrine\Bundle\DoctrineBundle\Registry;
use ParkBundle\Entity\Computer;
use ParkBundle\Entity\Person;

/**
 * Class ComputerManager
 * @package ParkBundle\Services
 */
class ComputerManager
{
    /**
     * @var Registry
     */
    protected $doctrine;

    /**
     * ComputerManager constructor.
     * @param $doctrine
     */
    public function __construct(Registry $doctrine)
    {
        $this->doctrine = $doctrine;
    }

    /**
     * @return int  Number computers
     */
    public function getNumberComputers()
    {
        return count($this->doctrine->getRepository("ParkBundle:Computer")->findAll());
    }

    /**
     * Create computer with their user
     *
     * @return array All computers
     */
    public function createComputersAndTheirUser()
    {
        // Get manager doctrine
        $em = $this->doctrine->getManager();
        // Get all computers and set new computers in database
        foreach ($this->getAllComputers() as $key => $computer) {
            $newComputer = new Computer();
            $newComputer->setIp($computer->getId());
            $newComputer->setEnabled($computer->getEnabled());
            $newComputer->setName($computer->getName());
            $newPerson = new Person();
            $newPerson->setFirstname("Firstname" . $key);
            $newPerson->setLastname("Lastname" . $key);
            $newPerson->addComputer($newComputer);
            $em->persist($newPerson);
        }
        $em->flush();

        return $this->getAllComputers();
    }


    /**
     * @return array Computers
     */
    public function getAllComputers()
    {
        return $this->doctrine->getRepository("ParkBundle:Computer")->findAll();
    }

    /**
     * @return bool True if computers are they deleted
     */
    public function removeAllComputers()
    {
        return $this->doctrine->getRepository("ParkBundle:Computer")->removeAll();
    }

}