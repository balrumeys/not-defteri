<?php
$notes = [];
$jsonFilePath = 'notes.json';

if (file_exists($jsonFilePath)) {
    $notes = json_decode(file_get_contents($jsonFilePath), true);
}

$title = "NOTLAR";
$sayfaBaslıgı = "NOTLAR";
$islemler = [
    [
        "href" => "/pages/add.php",
        "icon" => "../img/add-file.png",
        "title" => "Not Ekle",
        "class" => "add-note-image-btn",
    ],
];

include "../templates/notes.php";
