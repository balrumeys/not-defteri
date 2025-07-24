<?php

function showPage(string $page, array $vars)
{
    global $smarty;
    
    $smarty->assign($vars);
    $smarty->display($page);

    exit;
}
function getNotes()
{
    $notes = [];
    $jsonFilePath = 'notes.json';

    if (file_exists($jsonFilePath)) {
        $notes = json_decode(file_get_contents($jsonFilePath), true);
    }
    return $notes;
}