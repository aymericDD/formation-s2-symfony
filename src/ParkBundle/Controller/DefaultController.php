<?php

namespace ParkBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * Class DefaultController
 *
 * @package ParkBundle\Controller
 */
class DefaultController extends Controller
{
    /**
     * @Route(
     *      "/hello/{name}/{date}",
     *      requirements = { "name" = "[a-zA-Z]+", "date" = "[0-8]" }
     * )
     *
     * @param $name
     * @param $date
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction($name, $date)
    {
        return $this->render("ParkBundle:Default:index.html.twig", array(
            "name"  =>  $name,
            "date"  =>  $date,
        ));
    }

    /**
     * @Route("/tutu")
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function tutuAction()
    {
        return $this->render("ParkBundle:Page:tutu.html.twig");
    }
}
