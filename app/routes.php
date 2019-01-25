<?php
/**
 * Created by PhpStorm.
 * User: dario
 * Date: 24/01/2019
 * Time: 21:01
 */

$app->get('/', "App\Controllers\TestController::teste");
$app->get('/all', "App\Controllers\TestController::index");
$app->get('/show/{id}', "App\Controllers\TestController::show");
$app->get('/create', "App\Controllers\TestController::store");
$app->get('/update/{id}', "App\Controllers\TestController::update");
$app->get('/delete/{id}', "App\Controllers\TestController::delete");