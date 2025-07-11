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


<?php
$title ="NOT EKLE";
include "head.php";
?>

<body>

    <?php
    $sayfaBaslıgı = "NOT EKLE";
    $sayfaIconu = "img/go-back-arrow.png";
    $sayfaLinki = "notes.php";
    $tooltip = "Notlar";
    $id = "notlara-dön";
    include "header.php";
    ?>

    <div class="container add-wrapper">
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

    <?php
    include "footer.php";
    ?>

</body>

</html>