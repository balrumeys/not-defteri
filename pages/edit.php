<?php

require "smarty.php";

$notes = [];
$jsonFilePath = 'notes.json';
if (file_exists($jsonFilePath)) {
    $notes = json_decode(file_get_contents($jsonFilePath), true);
}
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


// include "../templates/pages/edit.php";
