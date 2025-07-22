<?php

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

header("Location: /notes");
exit;

// include "../templates/pages/edit.php";
