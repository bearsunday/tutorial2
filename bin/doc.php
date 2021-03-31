<?php

require dirname(__DIR__) . '/vendor/autoload.php';

use BEAR\ApiDoc\DocApp;

$docApp = new DocApp('MyVendor\Ticket');
$docApp->dumpHtml(dirname(__DIR__) . '/docs', 'app');