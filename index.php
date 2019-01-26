<?php
/**
 * Created by PhpStorm.
 * User: dario
 * Date: 24/01/2019
 * Time: 19:13
 */
require_once "vendor/autoload.php";

$app = new Silex\Application;
$app['debug'] = true;

require_once "app/routes.php";

$app->run();


