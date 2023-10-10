<?php

namespace App\Controller;

class Home implements IRequestController
{
    public function processRequest(): void
    {
        $title = "MAGAZORD APP";
        include_once __DIR__ . '/../../view/home.php';
    }
}