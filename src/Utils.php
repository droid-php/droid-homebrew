<?php

namespace Droid\Plugin\Homebrew;

use Symfony\Component\Process\Process;
use Symfony\Component\Process\ProcessBuilder;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Console\Output\OutputInterface;
use RuntimeException;

class Utils
{
    public static function executableExists($cmd)
    {
        $returnVal = shell_exec("which $cmd");
        return (empty($returnVal) ? false : true);
    }
    
    public static function runBrew($action, $arguments, OutputInterface $output)
    {
        $bin = 'brew';
        if (!self::executableExists($bin)) {
            throw new RuntimeException($bin .' command not available in this environment');
        }
        $cmd = $bin . ' ' . $action . ' ' . trim($arguments);
        $process = new Process($cmd);
        $output->writeLn($process->getCommandLine());
        $process->run();
        
        if (!$process->isSuccessful()) {
            throw new ProcessFailedException($process);
        }
        $output->write($process->getOutput());
    }
}
