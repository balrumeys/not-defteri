<?php
// Not kaydetme işlemi
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $title = trim($_POST['title']);
    $content = trim($_POST['content']);

    if ($title !== '' && $content !== '') {
        $newNote = [
            'title' => htmlspecialchars($title),
            'content' => htmlspecialchars($content),
            'date' => date("Y-m-d H:i:s"),
        ];

        $notes = [];
        if (file_exists('notes.json')) {
            $notes = json_decode(file_get_contents('notes.json'), true) ?? [];
        }
        $newId = array_key_last($notes) + 1;

        $notes[$newId] = $newNote;
        file_put_contents('notes.json', json_encode($notes, JSON_PRETTY_PRINT));
    }
    header("Location: /index.php");
    exit;
}

$title = "NOT EKLE";
$sayfaBaslıgı = "NOT EKLE";
$islemler = [
    [
        "href" => "/pages/notes.php",
        "icon" => "../img/go-back-arrow.png",
        "title" => "Notlar", //tool tip baslıgı
        "class" => "add-note-image-btn",
    ],
];

include "../templates/add.php";
