<?php
$notes = [];


if (file_exists('notes.json')) {
    $notes = json_decode(file_get_contents('notes.json'), true);
}
?>

<!DOCTYPE html>
<html>


<?php
$title = "NOTLAR";
include "head.php";
?>


<body>



    <?php
    $sayfaBaslıgı = "NOTLAR";
    $sayfaIconu = "img/add-file.png";
    $sayfaLinki = "add.php";
    include "header.php";
    ?>
    <div class="container notes-wrapper">

        <div class="notes vstack gap-3">
            <?php if (!empty($notes)): ?>
                <?php foreach ($notes as $id => $note): ?>
                    <div class="card ">
                        <div class="card-header d-flex justify-content-between">
                            <div>
                                <?= $note['title'] ?>
                                (<?= $note['date'] ?>)
                            </div>
                            <div>
                                <a href="delete.php?id=<?= $id ?>" class="btn btn-danger">Sil</a>
                                <a href="edit.php?id=<?= $id ?>" class="btn btn-success">Düzenle</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <?= nl2br($note['content']) ?>
                        </div>
                    </div>
                <?php endforeach; ?>
        </div>
    <?php else: ?>
        <p>Henüz not eklenmedi.</p>
    <?php endif; ?>


    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.7/js/bootstrap.min.js" integrity="sha512-zKeerWHHuP3ar7kX2WKBSENzb+GJytFSBL6HrR2nPSR1kOX1qjm+oHooQtbDpDBSITgyl7QXZApvDfDWvKjkUw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</body>

</html>