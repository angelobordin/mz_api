<?php

namespace App\Controller;

use App\Controller\IRequestController;

class RegisterContact implements IRequestController
{

    public function processRequest(): void
    {
        $title = "Cadastro de Pessoa";
        include_once __DIR__ . "/../../view/contact/registerContact.php";
    }

}