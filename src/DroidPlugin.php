<?php

namespace Droid\Plugin\Homebrew;

class DroidPlugin
{
    public function __construct($droid)
    {
        $this->droid = $droid;
    }
    
    public function getCommands()
    {
        $commands = [];
        $commands[] = new \Droid\Plugin\Homebrew\Command\HomebrewInstallCommand();
        $commands[] = new \Droid\Plugin\Homebrew\Command\BrewInstallCommand();
        $commands[] = new \Droid\Plugin\Homebrew\Command\BrewUninstallCommand();
        $commands[] = new \Droid\Plugin\Homebrew\Command\BrewUnlinkCommand();
        $commands[] = new \Droid\Plugin\Homebrew\Command\BrewTapCommand();
        $commands[] = new \Droid\Plugin\Homebrew\Command\BrewUntapCommand();
        $commands[] = new \Droid\Plugin\Homebrew\Command\CaskInstallCommand();
        $commands[] = new \Droid\Plugin\Homebrew\Command\CaskUninstallCommand();
        return $commands;
    }
}
