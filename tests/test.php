<?php

require_once __DIR__ . '/../vendor/autoload.php'; // Autoload files using Composer autoload

use PivotalTracker\PivotalTracker;

$client = new PivotalTracker('EXAMPLE_API_TOKEN');

$projects = $client->getProjects();

print_r($projects);

