<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require  __DIR__ . '/../vendor/autoload.php';
$smarty = new Smarty\Smarty();

$smarty->setTemplateDir('../templates');
$smarty->setCompileDir('../templates_c');
// $smarty->setCacheDir('/web/www.example.com/smarty/cache');
// $smarty->setConfigDir('/web/www.example.com/smarty/configs');




$notes = [];
$jsonFilePath = '../notes.json';

if (file_exists($jsonFilePath)) {
    $notes = json_decode(file_get_contents($jsonFilePath), true);
}


$islemler = [
    [
        "href" => "/pages/add.php",
        "icon" => "../img/add-file.png",
        "title" => "Not Ekle",
        "class" => "add-note-image-btn",
    ],
];


$smarty->assign('title', 'NOTLAR');
$smarty->assign('sayfaBasligi', 'NOTLAR');
$smarty->assign('islemler', $islemler);
$smarty->assign('notes', $notes);
$smarty->display('notes.tpl');
