<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>NOTLAR</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.7/css/bootstrap.min.css" integrity="sha512-fw7f+TcMjTb7bpbLJZlP8g2Y4XcCyFZW8uy8HsRZsH/SwbMw0plKHFHr99DN3l04VsYNwvzicUX/6qurvIxbxw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <header>
        <div class="full-header">
            <div class="container">
                <div class="menu">
                    <h1>NOTLAR</h1>
                    <a href="add.php" class="add-note-image-btn">
                        <img src="./img/add-file.png" alt="Not Ekle" />
                    </a>
                </div>
            </div>
        </div>
    </header>

    <div class="container notes-wrapper">

        <div class="notes vstack gap-3">
            <?php if (!empty($notes)): ?>
                <?php foreach ($notes as $id => $note): ?>
                    <div class="card ">
                        <div class="card-header d-flex mb-3 justify-content-between">
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