<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Process\Process;


class StepInfoCommand extends Command
{
    protected static $defaultName = 'app:step:info';
    protected static $defaultDescription = 'Add a short description for your command';

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $process = new Process(['git', 'tag', '-l', '--points-at', 'HEAD']);
        $process->mustRun();
        $output->write($process->getOutput());

        return Command::SUCCESS;
    }
}
