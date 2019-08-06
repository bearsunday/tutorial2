<?php
require dirname(__DIR__) . '/autoload.php';
require_once dirname(__DIR__) . '/env.php';
// dir
chdir(dirname(__DIR__));
passthru('rm -rf var/tmp/*');
passthru('chmod 775 var/tmp');
passthru('chmod 775 var/log');
// db
$pdo = new \PDO('mysql:host=' . getenv('TKT_DB_HOST'), getenv('TKT_DB_USER'), getenv('TKT_DB_PASS'));
$pdo->exec('CREATE DATABASE IF NOT EXISTS ' . getenv('TKT_DB_NAME'));
$pdo->exec('CREATE DATABASE IF NOT EXISTS ' . getenv('TKT_DB_NAME') . '_test');
passthru('./vendor/bin/phinx migrate -c var/phinx/phinx.php -e development');
passthru('./vendor/bin/phinx migrate -c var/phinx/phinx.php -e test');
