<?php

require "../smarty.php";

$id = $_GET['id'] ?? null;

$notes = [];
$jsonFilePath = '../notes.json';
if (file_exists($jsonFilePath)) {
    $notes = json_decode(file_get_contents($jsonFilePath), true);
}
$note = $notes[$id] ?? null;
if (empty($note)) {
    http_response_code(404);
    exit;
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
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

    header("Location: /index.php");
    exit;
}

$islemler = [
    [
        "href" => "/notes.php",
        "icon" => "../img/go-back-arrow.png",
        "title" => "Notlar",
        "class" => "add-note-image-btn",
    ],
];

$smarty->assign('title', 'NOT DÜZENLE');
$smarty->assign('sayfaBasligi', 'NOT DÜZENLE');
$smarty->assign('islemler', $islemler);
$smarty->assign('note', $note);
$smarty->display('pages/edit.tpl');


// include "../templates/pages/edit.php";
