<?php

namespace Commands;

use \Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;


class HelloCommand extends Command
{

    /**
     * @var string
     */
    protected static $defaultName = 'say-hello';


    public function __construct($name = null)
    {
        parent::__construct($name);

        $this->addArgument('user', InputArgument::OPTIONAL, 'Name of the user');
    }

    /**
     *
     */
    protected function configure()
    {
        $this->setDescription("Says hello to the user...");
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int|void|null
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln("Hello, " . ($input->getArgument('user') ?? 'Stranger') . '...');
    }
}
