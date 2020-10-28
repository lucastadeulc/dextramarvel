<?php

/** @var \Laravel\Lumen\Routing\Router $router */


$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['prefix' => '/v1/public/'], function () use ($router) {
    $router->get('characters',  ['uses' => 'CharacterController@showAllCharacters']);
  
    $router->get('characters/{id}', ['uses' => 'CharacterController@showOneCharacter']);

    $router->get('characters/{id}/{filter}', ['uses' => 'CharacterController@showOneFiltered']);
});
