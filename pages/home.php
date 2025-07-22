<?php

require "smarty.php";

$notes = [];
$jsonFilePath = 'notes.json';

if (file_exists($jsonFilePath)) {
    $notes = json_decode(file_get_contents($jsonFilePath), true);
}







$smarty->assign('title', 'NOT DEFTERİ');
$smarty->assign('sayfaBasligi', 'NOT DEFTERİ');
$smarty->assign('notes', $notes);

$smarty->display('pages/home.tpl');