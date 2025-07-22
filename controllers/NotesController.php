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
    public function create(Request $request, Response $response)
    {
        require "smarty.php";

        $islemler = [
            [
                "href" => "/notes",
                "icon" => "../img/go-back-arrow.png",
                "title" => "Notlar", //tool tip baslıgı
                "class" => "add-note-image-btn",
            ],
        ];
        $smarty->assign('title', 'NOT EKLE');
        $smarty->assign('sayfaBasligi', 'NOT EKLE');
        $smarty->assign('islemler', $islemler);

        $smarty->display('pages/add.tpl');
        exit;
    }
    public function store(Request $request, Response $response)
    {
        $title = trim($_POST['title']);
        $content = trim($_POST['content']);

        if ($title !== '' && $content !== '') {
            $newNote = [
                'title' => htmlspecialchars($title),
                'content' => htmlspecialchars($content),
                'date' => date("Y-m-d H:i:s"),
            ];

            $notes = [];
            $jsonFilePath = 'notes.json';
            if (file_exists($jsonFilePath)) {
                $notes = json_decode(file_get_contents($jsonFilePath), true) ?? [];
            }
            $newId = array_key_last($notes) + 1;

            $notes[$newId] = $newNote;
            file_put_contents($jsonFilePath, json_encode($notes, JSON_PRETTY_PRINT));
        }
        header("Location: /notes");
        exit;
    }
}
