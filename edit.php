<?php

$id = $_GET['id'] ?? null;

$notes = [];
if (file_exists('notes.json')) {
    $notes = json_decode(file_get_contents('notes.json'), true);
}
$note = $notes[$id] ?? null;
if (empty($note)) {
    http_response_code(404);
    exit;
}


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $title = trim($_POST['title']);
    $content = trim($_POST['content']);

    if ($title !== '' && $content !== '') {
        $newNote = [
            'title' => htmlspecialchars($title),
            'content' => htmlspecialchars($content),
            'date' => date("Y-m-d H:i:s"),
        ];

        $notes[$id] = $newNote;
        file_put_contents('notes.json', json_encode($notes, JSON_PRETTY_PRINT));
    }

    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <title>NOT DÜZENLE</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.7/css/bootstrap.min.css" integrity="sha512-fw7f+TcMjTb7bpbLJZlP8g2Y4XcCyFZW8uy8HsRZsH/SwbMw0plKHFHr99DN3l04VsYNwvzicUX/6qurvIxbxw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container edit-wrapper">
        <h1>NOT DÜZENLE</h1>

        <form method="POST">
            <label for="title" class="form-label">Başlık:</label>
            <input name="title" type="text" value="<?php echo htmlspecialchars($note['title']); ?>" class="form-control" required>

            <label for="content" class="form-label">Not:</label>
            <textarea name="content" placeholder="Content"><?php echo htmlspecialchars($note['content']); ?></textarea>

            <button type="submit" class="btn btn-primary">Kaydet</button>

        </form>

        <a class="btn btn-primary mt-3" href="index.php">Geri Dön</a>

    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.7/js/bootstrap.min.js" integrity="sha512-zKeerWHHuP3ar7kX2WKBSENzb+GJytFSBL6HrR2nPSR1kOX1qjm+oHooQtbDpDBSITgyl7QXZApvDfDWvKjkUw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</body>

</html>