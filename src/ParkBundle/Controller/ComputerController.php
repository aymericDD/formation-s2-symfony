<?php

namespace ParkBundle\Controller;

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
        return array( "computers" => $this->getAllComputers());
    }

    /**
     * @Route("/computer/all/", name="computerList")
     */
    public function listComputerAction()
    {
        return $this->render("@Park/Computer/listComputer.html.twig", array(
            "computers" => $this->getAllComputers()
        ));
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
        );
    }

}
