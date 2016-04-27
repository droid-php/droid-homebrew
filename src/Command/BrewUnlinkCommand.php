<?php

namespace Droid\Plugin\Homebrew\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use RuntimeException;
use Droid\Plugin\Homebrew\Utils;

class BrewUnlinkCommand extends Command
{
    public function configure()
    {
        $this->setName('brew:unlink')
            ->setDescription('Unlink homebrew package')
            ->addArgument(
                'package',
                InputArgument::REQUIRED,
                'Package(s) to unlink'
            )
        ;
    }
    
    public function execute(InputInterface $input, OutputInterface $output)
    {
        $package = $input->getArgument('package');
        Utils::runBrew('unlink', ' ' . $package, $output);
    }
}
