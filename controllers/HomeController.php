<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class HomeController
{
    public function index(Request $request, Response $response, $args)
    {
        require "smarty.php";

        $notes = [];
        $jsonFilePath = 'notes.json';

        if (file_exists($jsonFilePath)) {
            $notes = json_decode(file_get_contents($jsonFilePath), true);
        }



        $smarty->assign('title', 'NOT DEFTERİ');
        $smarty->assign('sayfaBasligi', 'NOT DEFTERİ');
        $smarty->assign('notes', $notes);

        $smarty->display('pages/home.tpl');
        return $response; // Ensure to return the response object
    }
}
