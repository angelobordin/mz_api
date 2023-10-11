<?php

namespace App\Controller;

use \App\utils\View;

class Page
{
    private static function getHeader()
    {
        return View::render('header');
    }

    private static function getFooter()
    {
        return View::render('footer');
    }

    public static function getPage(string $title, string $content)
    {
        return View::render('page', [
            'title' => $title,
            'header' => self::getHeader(),
            'footer' => self::getFooter(),
            'content' => $content
        ]);
    }
}