<?php

$id = $_GET['id'] ?? null;

$notes = [];
$jsonFilePath = '../notes.json';
if (file_exists($jsonFilePath)) {
    $notes = json_decode(file_get_contents($jsonFilePath), true);
}

if (isset($notes[$id])) {
    unset($notes[$id]);
    file_put_contents($jsonFilePath, json_encode($notes, JSON_PRETTY_PRINT));
}
header("Location: /index.php");
exit;
