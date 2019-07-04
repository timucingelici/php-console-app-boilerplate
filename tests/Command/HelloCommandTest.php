<?php

namespace Tests\Command;

use Commands\HelloCommand;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Console\Application;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Tester\CommandTester;

/**
 * Class HelloCommandTest
 * @package Tests\Command
 */
class HelloCommandTest extends TestCase
{
    /** @var Application */
    private $application;

    /** @var Command */
    private $command;

    /** @var string  */
    private $commandName = 'say-hello';

    /** @var CommandTester */
    private $commandTester;

    protected function setUp(): void
    {
        parent::setUp();

        $this->application = new Application();
        $this->application->add(new HelloCommand());

        $this->command = $this->application->find($this->commandName);
        $this->commandTester = new CommandTester($this->command);
    }

    public function testCommandAcceptsName()
    {
        $this->commandTester->execute([
            'command'  => $this->command->getName(),
            'user' => 'Tim',
        ]);

        $output = $this->commandTester->getDisplay();

        $this->assertStringContainsString('Hello, Tim...', $output);
    }

    public function testCommandReturnsDefaultWhenNoNameProvided(){

        $this->commandTester->execute([]);
        $output = $this->commandTester->getDisplay();

        $this->assertStringContainsString('Hello, Stranger...', $output);
    }
}
