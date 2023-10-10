<?php

namespace App\Controller;

use App\Controller\IRequestController;

class RegisterPerson implements IRequestController
{

    public function processRequest(): void
    {
        $title = "Cadastro de Pessoa";
        include_once __DIR__ . "/../../view/person/registerPerson.php";
    }

}