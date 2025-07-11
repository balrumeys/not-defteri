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


<?php
$title ="NOT DÜZENLE";
include "head.php";
?>

<body>
    <?php
    $sayfaBaslıgı = "NOT DÜZENLE";
    $sayfaIconu = "img/go-back-arrow.png";
    $sayfaLinki = "notes.php";
    include "header.php";
    ?>
    <div class="container edit-wrapper">


        <form method="POST">
            <label for="title" class="form-label">Başlık:</label>
            <input name="title" type="text" value="<?php echo htmlspecialchars($note['title']); ?>" class="form-control" required>

            <label for="content" class="form-label">Not:</label>
            <textarea name="content" placeholder="Content"><?php echo htmlspecialchars($note['content']); ?></textarea>
            <button type="submit" class="btn btn-success">Kaydet</button>

        </form>



    </div>

    <?php
    include "footer.php";
    ?>

</body>

</html>