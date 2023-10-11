<?php

namespace App\Controller;

use App\Controller\Page;
use App\utils\View;

class Home extends Page
{
    public function getHome(): string
    {
        $content = View::render('home', [
            'name' => "Magazord",
        ]);

        return self::getPage('Home', $content);
    }
}