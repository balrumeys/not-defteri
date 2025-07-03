<?php
$notes = [
      
];

// Not kaydetme işlemi
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $title = trim($_POST['title']);
    $content = trim($_POST['content']);

    if ($title !== '' && $content !== '') {
        $newNote = [
            'title' => htmlspecialchars($title),
            'content' => htmlspecialchars($content),
            'date' => date("Y-m-d H:i:s"),
        ];

        if (file_exists('notes.json')) {
            $notes = json_decode(file_get_contents('notes.json'), true);
        }

        $notes[] = $newNote;
        file_put_contents('notes.json', json_encode($notes, JSON_PRETTY_PRINT));
    }
    
  
}

// Notları oku
if (file_exists('notes.json')) {
    $notes = json_decode(file_get_contents('notes.json'), true);
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>PHP Not Defteri</title> 
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Not Defteri</h1>

    <form method="POST">
        <input type="text" name="title" placeholder="Not Başlığı" required><br><br>
        <textarea name="content" placeholder="Not İçeriği" required></textarea><br><br>
        <button type="submit">Kaydet</button>
    </form>

    <hr>

    <h2>Kayıtlı Notlar:</h2>
    <?php if (!empty($notes)): ?>
        <?php foreach ($notes as $note): ?>
            <div style="border:1px solid #ccc; padding:10px; margin-bottom:10px;">
                <strong><?= $note['title'] ?></strong> (<?= $note['date'] ?>)<br>
                <p><?= nl2br($note['content']) ?></p>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>Henüz not eklenmedi.</p>
    <?php endif; ?>
</body>
</html>
