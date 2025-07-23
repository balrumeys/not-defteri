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
    public function edit(Request $request, Response $response, $args)
    {
        require "smarty.php";


        $notes = [];
        $jsonFilePath = 'notes.json';
        if (file_exists($jsonFilePath)) {
            $notes = json_decode(file_get_contents($jsonFilePath), true);
        }
        $id = $args['id'] ?? null;
        $note = $notes[$id] ?? null;
        if (empty($note)) {
            http_response_code(404);
            exit;
        }


        $islemler = [
            [
                "href" => "/notes",
                "icon" => "/img/go-back-arrow.png",
                "title" => "Notlar",
                "class" => "add-note-image-btn",
            ],
        ];

        $smarty->assign('title', 'NOT DÜZENLE');
        $smarty->assign('sayfaBasligi', 'NOT DÜZENLE');
        $smarty->assign('islemler', $islemler);
        $smarty->assign('note', $note);
        $smarty->assign('id', $id);

        $smarty->display('pages/edit.tpl');
        return $response;
    }

    public function update(Request $request, Response $response, $args)
    {
        $notes = [];
        $jsonFilePath = 'notes.json';
        if (file_exists($jsonFilePath)) {
            $notes = json_decode(file_get_contents($jsonFilePath), true);
        }
        $id = $args['id'] ?? null;
        $note = $notes[$id] ?? null;
        if (empty($note)) {
            http_response_code(404);
            exit;
        }


        $title = trim($_POST['title']);
        $content = trim($_POST['content']);

        if ($title !== '' && $content !== '') {
            $newNote = [
                'title' => htmlspecialchars($title),
                'content' => htmlspecialchars($content),
                'date' => date("Y-m-d H:i:s"),
            ];

            $notes[$id] = $newNote;
            file_put_contents($jsonFilePath, json_encode($notes, JSON_PRETTY_PRINT));
        }

        header("Location: /notes");
        exit;
    }
}
