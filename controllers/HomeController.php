<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class HomeController
{
    public function index(Request $request, Response $response, $args)
    {
        global $smarty;

        $page = 'pages/home.tpl';
        $notes = getNotes();

        $smarty->assign('title', 'NOT DEFTERİ');
        $smarty->assign('sayfaBasligi', 'NOT DEFTERİ');
        $smarty->assign('notes', $notes);

        showPage($page);
    }
}
