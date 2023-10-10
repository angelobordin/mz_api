<?php

namespace App\Controller;

use App\Controller\IRequestController;
use db\__mock__\PersonApi;

class ListPerson implements IRequestController
{

    public function processRequest(): void
    {
        $title = "Pessoas Cadastradas";
        include_once __DIR__ . "/../../view/person/listPerson.php";
    }

}