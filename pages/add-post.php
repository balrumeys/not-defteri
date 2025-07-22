<?php

$title = trim($_POST['title']);
$content = trim($_POST['content']);

if ($title !== '' && $content !== '') {
    $newNote = [
        'title' => htmlspecialchars($title),
        'content' => htmlspecialchars($content),
        'date' => date("Y-m-d H:i:s"),
    ];

    $notes = [];
    $jsonFilePath = 'notes.json';
    if (file_exists($jsonFilePath)) {
        $notes = json_decode(file_get_contents($jsonFilePath), true) ?? [];
    }
    $newId = array_key_last($notes) + 1;

    $notes[$newId] = $newNote;
    file_put_contents($jsonFilePath, json_encode($notes, JSON_PRETTY_PRINT));
}
header("Location: /notes");
exit;
