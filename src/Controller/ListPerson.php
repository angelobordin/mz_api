<?php

namespace App\Controller;

use App\Controller\IRequestController;

class ListPerson implements IRequestController
{

    public function processRequest(): void
    {
        $title = "Pessoas Cadastradas";
        include_once __DIR__ . "/../../view/person/listPerson.php";
    }

}