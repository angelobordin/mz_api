<?php

namespace App\Controller;

interface IRequestController
{
    public function processRequest(): void;
}