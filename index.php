<?php
$notes = [];

// Not kaydetme işlemi

// Notları oku
if (file_exists('notes.json')) {
    $notes = json_decode(file_get_contents('notes.json'), true);
}

include 'notes.php';
