<?php
$app['debug'] = true;
$app['log.level'] = Monolog\Logger::DEBUG;
$app['db.options'] = array(
    'driver' => 'pdo_sqlite',
    'path' => realpath(ROOT_PATH . 'resources/data/database.db'),
);
$app['api.version'] = "v1";
$app['api.endpoint'] = "/api";