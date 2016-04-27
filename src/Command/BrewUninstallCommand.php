<?php

namespace Droid\Plugin\Homebrew\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use RuntimeException;
use Droid\Plugin\Homebrew\Utils;

class BrewUninstallCommand extends Command
{
    public function configure()
    {
        $this->setName('brew:uninstall')
            ->setDescription('Uninstall/remove homebrew package')
            ->addArgument(
                'package',
                InputArgument::REQUIRED,
                'Package(s) to uninstall'
            )
        ;
    }
    
    public function execute(InputInterface $input, OutputInterface $output)
    {
        $package = $input->getArgument('package');
        Utils::runBrew('uninstall', ' ' . $package, $output);
    }
}
