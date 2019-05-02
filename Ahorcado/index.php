<?php

session_start();
if($_SERVER['$_REQUEST_METHOD ! = GET']){
    die;
}
require 'ControllerInterface.php';
require 'Router.php';
require 'Ahorcado.php';
require 'Palabra.php';
require 'Letra.php';


$router = new Router;
$router->agregarController ('empezar', new Palabra);
$router->agregarController ('jugar', new Letra);
$c= $router->dispatch($_GET ['path']);
$c->get();

 