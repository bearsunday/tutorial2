<?php

declare(strict_types=1);

use BEAR\Dotenv\Dotenv;

require_once dirname(__DIR__) . '/vendor/autoload.php';

(new Dotenv())->load(dirname(__DIR__));
chdir(dirname(__DIR__));

// dir
chdir(dirname(__DIR__));
passthru('rm -rf var/tmp/*');
passthru('chmod 775 var/tmp');
passthru('chmod 775 var/log');

// db
$pdo = new PDO('mysql:host=' . getenv('TKT_DB_HOST'), getenv('TKT_DB_USER'), getenv('TKT_DB_PASS'));
$pdo->exec('DROP DATABASE IF EXISTS ' . getenv('TKT_DB_NAME'));
$pdo->exec('DROP DATABASE IF EXISTS ' . getenv('TKT_DB_NAME')) . '_test';
$pdo->exec('CREATE DATABASE IF NOT EXISTS ' . getenv('TKT_DB_NAME'));
$pdo->exec('CREATE DATABASE IF NOT EXISTS ' . getenv('TKT_DB_NAME') . '_test');
passthru('./vendor/bin/phinx migrate -c var/phinx/phinx.php -e development');
passthru('./vendor/bin/phinx migrate -c var/phinx/phinx.php -e test');
