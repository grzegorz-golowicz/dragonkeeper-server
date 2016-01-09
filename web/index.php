<?php
define('ROOT_PATH', realpath(__DIR__ . '/..'));
require_once ROOT_PATH . '/vendor/autoload.php';
$app = new Silex\Application();
require ROOT_PATH . '/resources/config/dev.php';
require ROOT_PATH . '/src/app.php';
$app['http_cache']->run();