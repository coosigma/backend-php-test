<?php

use Symfony\Component\Debug\Debug;

require_once __DIR__ . '/../vendor/autoload.php';

Debug::enable();

$filename = __DIR__ . preg_replace('#(\?.*)$#', '', $_SERVER['REQUEST_URI']);
if (php_sapi_name() === 'cli-server' && is_file($filename)) {
    return false;
}


$app = require __DIR__ . '/../src/app.php';
require __DIR__ . '/../config/dev.php';
require __DIR__ . '/../src/controllers.php';
require __DIR__ . '/../ORM/Model.php';
require __DIR__ . '/../models/Todo.php';
require __DIR__ . '/../models/User.php';
$app->run();
