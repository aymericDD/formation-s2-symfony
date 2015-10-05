<?php

namespace ParkBundle\Twig\Extension;

/**
 * Class ComputerStatusExtension
 * @package ParkBundle\Twig\Extension
 */
class ComputerExtension extends \Twig_Extension
{

    /**
     * @param \Twig_Environment $env
     * @param $status
     * @return string
     */
    public function renderComputerStatus(\Twig_Environment $env, $status)
    {
        //return processed template content
        return $env->render(
            'ParkBundle:Computer:Status/index.html.twig',
            array(
                'status' => (bool)$status,
            )
        );
    }

    /**
     * Met le premier caractère en majuscule
     *
     * @param $value
     * @return string
     */
    public function renderComputerName($value)
    {
        return lcfirst(strtoupper($value));
    }

    /**
     * @return array
     */
    public function getFilters()
    {
        return array(
            new \Twig_SimpleFilter(
                'computer_status',
                array($this, 'renderComputerStatus'),
                array(
                    'is_safe' => array('html'),
                    'needs_environment' => true
                )
            ),
            new \Twig_SimpleFilter(
                'computer_name',
                array($this, 'renderComputerName'),
                array(
                    'is_safe' => array('html')
                )
            )
        );
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'park_computer_extension';
    }
}
