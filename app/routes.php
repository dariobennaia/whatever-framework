<?php
/**
 * Created by PhpStorm.
 * User: dario
 * Date: 24/01/2019
 * Time: 21:01
 */

$app->get('/', "App\Controllers\TestController::index");
$app->get('/{id}', "App\Controllers\TestController::show");

$app->get('/novo', "App\Controllers\TestController::create");
$app->post('/store', "App\Controllers\TestController::store");

$app->get('/atualizar/{id}', "App\Controllers\TestController::formAtualizar");
$app->patch('/update/{id}', "App\Controllers\TestController::update");

$app->delete('/delete/{id}', "App\Controllers\TestController::delete");