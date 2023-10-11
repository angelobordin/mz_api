<?php

require __DIR__ . '/../vendor/autoload.php';

use App\Controller\Contact;
use App\Controller\Home;
use App\Controller\Person;

define("URL", 'http://localhost:8000/');

switch ($_SERVER['PATH_INFO']) {
  case '/person/list':
    $controlador = new Person();
    echo $controlador->personList();
    break;

  case '/contact/list':
    $controlador = new Contact();
    echo $controlador->contactList();
    break;

  case '/person/register':
    $controlador = new Person();
    echo $controlador->personRegister();
    break;

  case '/contact/register':
    $controlador = new Contact();
    echo $controlador->contactRegister();
    break;

  default:
    $controlador = new Home();
    echo $controlador->getHome();
    break;
}