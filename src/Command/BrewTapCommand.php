<?php

namespace Droid\Plugin\Homebrew\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use RuntimeException;
use Droid\Plugin\Homebrew\Utils;

class BrewTapCommand extends Command
{
    public function configure()
    {
        $this->setName('brew:tap')
            ->setDescription('Adds a homebrew tap')
            ->addArgument(
                'tap',
                InputArgument::REQUIRED,
                'Tap to add'
            )
        ;
    }
    
    public function execute(InputInterface $input, OutputInterface $output)
    {
        $tap = $input->getArgument('tap');
        Utils::runBrew('tap', $tap, $output);
    }
}
