<?php

namespace Droid\Plugin\Homebrew\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use RuntimeException;
use Droid\Plugin\Homebrew\Utils;

class CaskInstallCommand extends Command
{
    public function configure()
    {
        $this->setName('cask:install')
            ->setDescription('Install homebrew cask package')
            ->addArgument(
                'package',
                InputArgument::REQUIRED,
                'Package(s) to install'
            )
        ;
    }
    
    public function execute(InputInterface $input, OutputInterface $output)
    {
        $package = $input->getArgument('package');
        Utils::runBrew('cask install', $package, $output);
    }
}