<?php

namespace ParkBundle\Controller;

use ParkBundle\Entity\Computer;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class ComputerController extends Controller
{
    /**
     * @Route("/computer/debug/", name="computerDebug")
     * @Template()
     */
    public function debugAction()
    {
        return array( "computers" => $this->getDoctrine()->getRepository("ParkBundle:Computer")->findAll());
    }

    /**
     * @Route("/computer/all/", name="computerList")
     */
    public function listComputerAction()
    {
        return $this->render("@Park/Computer/listComputer.html.twig", array(
            "computers" => $this->getDoctrine()->getRepository("ParkBundle:Computer")->findAll()
        ));
    }

    /**
     * @Route("/computer/create/")
     */
    public function createAction()
    {
        // Get manager doctrine
        $em = $this->getDoctrine()->getManager();
        // Get all computers and set new computers in database
        foreach ($this->getAllComputers() as $computer) {
            $newComputer = new Computer();
            $newComputer->setIp($computer["ip"]);
            $newComputer->setEnabled($computer["enabled"]);
            $newComputer->setName($computer["name"]);
            $em->persist($newComputer);
        }
        $em->flush();
        die("Computers created ". count($this->getAllComputers()));
    }

    /**
     * @Route("/computer/remove/all")
     */
    public function deleteAction()
    {
        $this->getDoctrine()->getRepository("ParkBundle:Computer")->removeAll();
        die('All computes are removed');
    }

    /**
     * @return array Computers
     */
    protected function getAllComputers()
    {
        return array(
            0 => array(
                "id"    => 1,
                "name"  => "ordinateur 1",
                "ip"  => "192.168.0.1",
                "enabled"  => true,
            ),
            1 => array(
                "id"    => 2,
                "name"  => "Ordinateur 2",
                "ip"  => "192.168.0.2",
                "enabled"  => false,
            ),
            2 => array(
                "id"    => 3,
                "name"  => "Ordinateur 3",
                "ip"  => "192.168.0.3",
                "enabled"  => true,
            ),
            3 => array(
                "id"    => 4,
                "name"  => "Ordinateur 4",
                "ip"  => "192.168.0.4",
                "enabled"  => false,
            ),
            4 => array(
                "id"    => 5,
                "name"  => "Ordinateur 5",
                "ip"  => "192.168.0.5",
                "enabled"  => true,
            ),
        );
    }

}
