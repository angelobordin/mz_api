<?php

namespace App\Controller;

use App\Controller\IRequestController;

class ListContact implements IRequestController
{
    public function processRequest(): void
    {
        $title = "Contatos Registrados";
        include_once __DIR__ . "/../../view/contact/listContact.php";
    }
}