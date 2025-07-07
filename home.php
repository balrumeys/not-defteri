<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>PHP Not Defteri</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.7/css/bootstrap.min.css" integrity="sha512-fw7f+TcMjTb7bpbLJZlP8g2Y4XcCyFZW8uy8HsRZsH/SwbMw0plKHFHr99DN3l04VsYNwvzicUX/6qurvIxbxw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h1>Not Defteri</h1>

    <form method="POST">
        <input type="text" name="title" placeholder="Başlığı giriniz" required><br><br>
        <textarea name="content" placeholder="Notunuzu yazınız" required></textarea><br><br>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.7/js/bootstrap.min.js" integrity="sha512-zKeerWHHuP3ar7kX2WKBSENzb+GJytFSBL6HrR2nPSR1kOX1qjm+oHooQtbDpDBSITgyl7QXZApvDfDWvKjkUw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>

</html>