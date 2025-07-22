<?php

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
