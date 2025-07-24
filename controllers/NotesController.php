<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class NotesController
{

    public function index(Request $request, Response $response)
    {
        $page = 'pages/notes.tpl';
        $notes = getNotes();
        $islemler = [
            [
                "href" => "/notes/add",
                "icon" => "/img/add-file.png",
                "title" => "Not Ekle",
                "class" => "add-note-image-btn",
            ],
        ];
        $vars = [
            "title" => ".NOTLAR",
            "sayfaBasligi" => "NOTLAR",
            "islemler" => $islemler,
            "notes" => $notes,
        ];

        showPage($page, $vars);
    }

    public function create(Request $request, Response $response)
    {
        $page = 'pages/add.tpl';
        $islemler = [
            [
                "href" => "/notes",
                "icon" => "../img/go-back-arrow.png",
                "title" => "Notlar", //tool tip baslıgı
                "class" => "add-note-image-btn",
            ],
        ];
        $vars = [
            "title" => "NOT EKLE",
            "sayfaBasligi" => "NOT EKLE",
            "islemler" => $islemler,
        ];
        showPage($page, $vars);
    }

    public function store(Request $request, Response $response)
    {
        $title = trim($_POST['title']);
        $content = trim($_POST['content']);
        $isDataValid = $title !== '' && $content !== '';

        if ($isDataValid) {
            $newNote = [
                'title' => $title,
                'content' => $content,
                'date' => date("Y-m-d H:i:s"),
            ];
            $jsonFilePath = 'notes.json';
            $notes = getNotes();
            $newId = array_key_last($notes) + 1;
            $notes[$newId] = $newNote;
            file_put_contents($jsonFilePath, json_encode($notes, JSON_PRETTY_PRINT));
        }

        header("Location: /notes");
        exit;
    }

    public function edit(Request $request, Response $response, $args)
    {
        $page = 'pages/edit.tpl';
        $notes = getNotes();
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
        $vars = [
            'title' => 'NOT DÜZENLE',
            'sayfaBasligi' => 'NOT DÜZENLE',
            'islemler' => $islemler,
            'note' => $note,
            'id' => $id,
        ];

        showPage($page, $vars);
    }

    public function update(Request $request, Response $response, $args)
    {
        $jsonFilePath = 'notes.json';
        $notes = getNotes();
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
                'title' => $title,
                'content' => $content,
                'date' => date("Y-m-d H:i:s"),
            ];
            $notes[$id] = $newNote;
            file_put_contents($jsonFilePath, json_encode($notes, JSON_PRETTY_PRINT));
        }

        header("Location: /notes");
        exit;
    }

    public function delete(Request $request, Response $response, $args)
    {
        $id = $args['id'] ?? null;
        $jsonFilePath = 'notes.json';
        $notes = getNotes();

        if (isset($notes[$id])) {
            unset($notes[$id]);
            file_put_contents($jsonFilePath, json_encode($notes, JSON_PRETTY_PRINT));
        }

        header("Location: /notes");
        exit;
    }
}
