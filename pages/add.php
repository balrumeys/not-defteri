<?php

require "../smarty.php";
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
        $jsonFilePath = '../notes.json';
        if (file_exists($jsonFilePath)) {
            $notes = json_decode(file_get_contents($jsonFilePath), true) ?? [];
        }
        $newId = array_key_last($notes) + 1;

        $notes[$newId] = $newNote;
        file_put_contents($jsonFilePath, json_encode($notes, JSON_PRETTY_PRINT));
    }
    header("Location: /index.php");
    exit;
}


$islemler = [
    [
        "href" => "/pages/notes.php",
        "icon" => "../img/go-back-arrow.png",
        "title" => "Notlar", //tool tip baslıgı
        "class" => "add-note-image-btn",
    ],
];
$smarty->assign('title', 'NOT EKLE');
$smarty->assign('sayfaBasligi', 'NOT EKLE');
$smarty->assign('islemler', $islemler);
$smarty->display('pages/add.tpl');
