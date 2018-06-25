<?php
// chama a inicializaçao do core

$routes = require_once __DIR__ . "/../app/routes.php"; 

$route = new \Core\Route($routes);

