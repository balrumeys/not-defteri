<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class NotesController
{
    public function index(Request $request, Response $response)
    {
        require "smarty.php";

        $notes = [];
        $jsonFilePath = 'notes.json';

        if (file_exists($jsonFilePath)) {
            $notes = json_decode(file_get_contents($jsonFilePath), true);
        }


        $islemler = [
            [
                "href" => "/notes/add",
                "icon" => "/img/add-file.png",
                "title" => "Not Ekle",
                "class" => "add-note-image-btn",
            ],
        ];


        $smarty->assign('title', 'NOTLAR');
        $smarty->assign('sayfaBasligi', 'NOTLAR');
        $smarty->assign('islemler', $islemler);
        $smarty->assign('notes', $notes);
        
        $smarty->display('pages/notes.tpl');
        exit;
    }
}
