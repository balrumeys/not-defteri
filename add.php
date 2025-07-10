<?php
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

        $notes = [];
        if (file_exists('notes.json')) {
            $notes = json_decode(file_get_contents('notes.json'), true) ?? [];
        }
        $newId = array_key_last($notes) + 1;

        $notes[$newId] = $newNote;
        file_put_contents('notes.json', json_encode($notes, JSON_PRETTY_PRINT));
    }
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>NOT EKLE</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.7/css/bootstrap.min.css" integrity="sha512-fw7f+TcMjTb7bpbLJZlP8g2Y4XcCyFZW8uy8HsRZsH/SwbMw0plKHFHr99DN3l04VsYNwvzicUX/6qurvIxbxw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <?php
    $sayfaBaslıgı = "NOT EKLE";
    $sayfaIconu = "img/go-back-arrow.png";
    $sayfaLinki = "notes.php";
    include "header.php";
    ?>

    <div class="container notes -wrapper">
        <form method="POST">
            <div class="mb-3">
                <label for="title" class="form-label">Başlık:</label>
                <input name='title' type="text" class="form-control" id="title" placeholder="alınacaklar..">
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Not:</label>
                <textarea name='content' class="form-control" id="content" rows="3" placeholder="ekmek,süt,yumurta..."></textarea>
            </div>
            <button type="submit" class="btn btn-success">Kaydet</button>
        </form>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.7/js/bootstrap.min.js" integrity="sha512-zKeerWHHuP3ar7kX2WKBSENzb+GJytFSBL6HrR2nPSR1kOX1qjm+oHooQtbDpDBSITgyl7QXZApvDfDWvKjkUw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</body>


</html>