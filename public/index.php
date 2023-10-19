<?php
// if (extension_loaded('pdo_mysql')) {
//   echo 'O driver PDO MySQL está habilitado.';
// } else {
//   echo 'O driver PDO MySQL não está habilitado.';
// }

require __DIR__ . '/../vendor/autoload.php';

use App\Controller\Contact;
use App\Controller\Home;
use App\Controller\Person;

define("URL", 'http://localhost:8000/');

$pathInfo = $_SERVER['PATH_INFO'];

$editContactPattern = '/^\/edit\/contact\/(\d+)$/';
$deleteContactPattern = '/^\/delete\/contact\/(\d+)$/';
$editPersonPattern = '/^\/edit\/person\/(\d+)$/';
$deletePersonPattern = '/^\/delete\/person\/(\d+)$/';

switch ($pathInfo) {
  case '/person/list':
    $controller = new Person();
    echo $controller->personList();
    break;

  case '/contact/list':
    $controller = new Contact();
    echo $controller->contactList();
    break;

  case '/person/register':
    $controller = new Person();
    echo $controller->personRegister();
    break;

  case '/contact/register':
    $controller = new Contact();
    echo $controller->contactRegister();
    break;

  default:
    // /edit/contact/:id
    if (preg_match($editContactPattern, $pathInfo, $matches)) {
      $id = $matches[1];
      $controller = new Contact();
      echo $controller->editContactById($id);

    }
    // /edit/person/:id
    else if (preg_match($editPersonPattern, $pathInfo, $matches)) {
      $id = $matches[1];
      $controller = new Person();
      echo $controller->editPersonById($id);

    }
    // /delete/contact/:id
    else if (preg_match($deleteContactPattern, $pathInfo, $matches)) {
      $id = $matches[1];
      $controller = new Contact();
      echo $controller->deleteContactById($id);

    }
    // /delete/person/:id
    else if (preg_match($deletePersonPattern, $pathInfo, $matches)) {
      $id = $matches[1];
      $controller = new Person();
      echo $controller->deletePersonById($id);

    } else {
      $controller = new Home();
      echo $controller->getHome();
    }
    break;
}