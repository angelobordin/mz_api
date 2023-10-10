<?php

require __DIR__ . '/../vendor/autoload.php';

use App\Controller\ListPerson;
use App\Controller\RegisterPerson;
use App\Controller\Home;

switch (@$_SERVER['PATH_INFO']) {
  case '/person/list':
    $controlador = new ListPerson();
    $controlador->processRequest();
    break;

  case '/person/register':
    $controlador = new RegisterPerson();
    $controlador->processRequest();
    break;

  case '';
  case '/';
  case '/home';
  case '/index';
    $controlador = new Home();
    $controlador->processRequest();
    break;

  default:
    echo "Erro 404 - Página não encontrada";
    break;
}