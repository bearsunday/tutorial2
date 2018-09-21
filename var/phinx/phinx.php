<?php
require_once dirname(__DIR__, 2) . '/env.php';
$devlopment = new \PDO(getenv('TKT_DB_DSN'), getenv('TKT_DB_USER'), getenv('TKT_DB_PASS'));
$test = new \PDO(getenv('TKT_DB_DSN') . '_test', getenv('TKT_DB_USER'), getenv('TKT_DB_PASS'));
return [
    'paths' => [
        'migrations' => __DIR__ . '/migrations',
    ],
    'environments' => [
        'development' => [
            'name' => $devlopment->query("SELECT DATABASE()")->fetchColumn(),
            'connection' => $devlopment
        ],
        'test' => [
            'name' => $test->query("SELECT DATABASE()")->fetchColumn(),
            'connection' => $test
        ]
    ]
];
