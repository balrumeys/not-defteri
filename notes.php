<?php
$notes = [];

if (file_exists('notes.json')) {
    $notes = json_decode(file_get_contents('notes.json'), true);
}

$title = "NOTLAR";
$sayfaBaslıgı = "NOTLAR";
$islemler = [
    [
        "href" => "add.php",
        "icon" => "img/add-file.png",
        "title" => "Not Ekle",
        "class" => "add-note-image-btn",
    ],
];

include "templates/notes.php";
