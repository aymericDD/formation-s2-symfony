<?php

namespace ParkBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class ToggleStatusCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('parkBundle:change:status')
            ->setDescription('Change all computer status')
            ->addArgument(
                'type',
                InputArgument::REQUIRED,
                'Please chose enabled or disabled'
            )
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $type = $input->getArgument('type');

        Validator::validateFormat($type);

        $em = $this->getContainer()->get('doctrine')->getManager();
        $computers = $this->getContainer()->get('doctrine')->getRepository("ParkBundle:Computer")->findAll();
        foreach ($computers as $computer) {
            $computer->setEnabled(($type == "enabled")? true : false);
        }
        $em->flush();
        $output->writeln(count($computers) . " computers have been updated");


    }
}