<?php

require __DIR__ . '/../vendor/autoload.php';

use Symfony\Component\Console\Application;
use Commands\HelloCommand;

$app = new Application();

$app->add(new HelloCommand());

$app->run();