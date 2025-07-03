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